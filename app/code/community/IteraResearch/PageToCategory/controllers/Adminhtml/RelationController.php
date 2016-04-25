<?php
/**
 * This file is part of PageToCategory extension.
 *
 * @category    IteraResearch
 * @package     IteraResearch_PageToCategory
 * @copyright   Copyright (c) 2003-2015 Itera Research, Inc. All rights reserved. (http://www.itera-research.com/)
 * @license     http://www.gnu.org/licenses Lesser General Public License
 */

class IteraResearch_PageToCategory_Adminhtml_RelationController extends Mage_Adminhtml_Controller_Action
{
    protected function _initPage()
    {
        $id = $this->getRequest()->getParam('page_id');
        $model = Mage::getModel('cms/page');
        if ($id) {
            $model->load($id);
            if (! $model->getId()) {
                Mage::getSingleton('adminhtml/session')->addError(
                    Mage::helper('cms')->__('This page no longer exists.'));
                $this->_redirect('*/*/');
                return $model;
            }
        }
        $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
        if (! empty($data)) {
            $model->setData($data);
        }
        Mage::register('cms_page', $model);
        return $model;
    }

    /**
     * Product list page
     */
    public function indexAction()
    {
        $this->_initPage();
        $this->loadLayout();
        $this->renderLayout();
    }

    /**
     * Get categories fieldset block
     */
    public function categoriesAction()
    {
        $this->_initPage();
        $this->loadLayout();
        $this->renderLayout();
    }

    public function categoriesJsonAction()
    {
        $page = $this->_initPage();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('pagetocategory/adminhtml_cms_page_edit_tab_categories')
                ->getCategoryChildrenJson($this->getRequest()->getParam('category'))
        );
    }
}