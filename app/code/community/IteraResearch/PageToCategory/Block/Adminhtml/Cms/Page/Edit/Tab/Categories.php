<?php
/**
 * This file is part of PageToCategory extension.
 *
 * @category    IteraResearch
 * @package     IteraResearch_PageToCategory
 * @copyright   Copyright (c) 2003-2015 Itera Research, Inc. All rights reserved. (http://www.itera-research.com/)
 * @license     http://www.gnu.org/licenses Lesser General Public License
 */

class IteraResearch_PageToCategory_Block_Adminhtml_Cms_Page_Edit_Tab_Categories
    extends Mage_Adminhtml_Block_Catalog_Product_Edit_Tab_Categories
    implements Mage_Adminhtml_Block_Widget_Tab_Interface
{
    /**
     * Checks when this block is readonly
     *
     * @return boolean
     */
    public function isReadonly()
    {
        return false;
    }

    /**
     * Retrieve currently edited page
     *
     * @return Mage_Cms_Model_Page
     */
    public function getPage()
    {
        return Mage::registry('cms_page');
    }

    /**
     * Return array with category IDs which the page is assigned to
     *
     * @return array
     */
    protected function getCategoryIds()
    {
        $cids = array();
        $page = $this->getPage();
        if ($page) {
            /* @var $relations IteraResearch_PageToCategory_Model_Resource_Relation_Collection */
            $relations = Mage::getModel('pagetocategory/relation')->getCollection();
            $relations->addFieldToFilter('page_id', $page->getId());
            foreach ($relations as $relation) {
                $cids[] = $relation->getCategoryId();
            }
        }
        return $cids;
    }

    /**
     * Returns URL for loading tree
     *
     * @param null $expanded
     * @return string
     */
    public function getLoadTreeUrl($expanded = null)
    {
        return $this->getUrl('pagetocategory/adminhtml_relation/categoriesJson', array('_current' => true));
    }

    /**
     * Return Tab label
     *
     * @return string
     */
    public function getTabLabel()
    {
        return Mage::helper('catalog')->__('Categories');
    }

    /**
     * Return Tab title
     *
     * @return string
     */
    public function getTabTitle()
    {
        return Mage::helper('catalog')->__('Categories');
    }

    /**
     * Can show tab in tabs
     *
     * @return boolean
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * Tab is hidden
     *
     * @return boolean
     */
    public function isHidden()
    {
        return false;
    }
}
