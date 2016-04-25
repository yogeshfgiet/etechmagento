<?php
/**
 * This file is part of PageToCategory extension.
 *
 * @category    IteraResearch
 * @package     IteraResearch_PageToCategory
 * @copyright   Copyright (c) 2003-2015 Itera Research, Inc. All rights reserved. (http://www.itera-research.com/)
 * @license     http://www.gnu.org/licenses Lesser General Public License
 */

class IteraResearch_PageToCategory_Model_Relation extends Mage_Core_Model_Abstract
{
    const XML_PATH_USE_PAGE_TITLE = 'cms/pagetocategory/use_page_title';
    const XML_PATH_SHOW_IN_LEFT_NAV = 'cms/pagetocategory/show_in_left_navigation';

    protected $_pages = array();

    /**
     * Initialize resource model
     *
     */
    protected function _construct()
    {
        $this->_init('pagetocategory/relation');
    }

    public function getPageByCategoryId($categoryId)
    {
        if (!isset($this->_pages[$categoryId])) {
            $this->_pages[$categoryId] = $this->getResource()->getPageByCategoryId($categoryId);
        }
        return $this->_pages[$categoryId];
    }

    public function getPageTitleByCategoryId($categoryId)
    {
        return $this->_pages[$categoryId]['title'];
    }

    public function getPageUrlByCategoryId($categoryId)
    {
        return Mage::getUrl(null, array('_direct' => $this->_pages[$categoryId]['identifier']));
    }

    public function canShowInLeftNavigation()
    {
        return Mage::getStoreConfig(self::XML_PATH_SHOW_IN_LEFT_NAV);
    }

    public function canUsePageTitle()
    {
        return Mage::getStoreConfig(self::XML_PATH_USE_PAGE_TITLE);
    }

    public function deleteByCategoryId($categoryId)
    {
        $relations = $this->getCollection();
        $relations->addFieldToFilter('category_id', $categoryId);
        foreach ($relations as $relation) {
            $relation->delete();
        }
    }

    public function deleteByPageId($pageId)
    {
        $relations = $this->getCollection();
        $relations->addFieldToFilter('page_id', $pageId);
        foreach ($relations as $relation) {
            $relation->delete();
        }
    }

    /**
     * Check if category already has assigned page in the same store.
     *
     * @param $page
     * @param $categoryIds
     */
    public function validateAssignment($page, $categoryIds)
    {
        $resourceModel = $this->getResource();
        foreach ($categoryIds as $cid) {
            if (!$resourceModel->canAssignPageToCategory($page, $cid)) {
                $cat = Mage::getModel('catalog/category')->load($cid);
                if (!Mage::app()->isSingleStoreMode()) {
                    $message = Mage::helper('pagetocategory')->__("Category '%s' (ID: %s) already has assigned page in selected store(s). Please assign page to another category or select another store(s).", $cat->getName(), $cid);
                } else {
                    $message = Mage::helper('pagetocategory')->__("Category '%s' (ID: %s) already has assigned page. Please assign page to another category.", $cat->getName(), $cid);
                }
                Mage::throwException($message);
            }
        }
    }
}
