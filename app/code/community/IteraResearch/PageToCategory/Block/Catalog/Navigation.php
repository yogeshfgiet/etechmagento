<?php
/**
 * This file is part of PageToCategory extension.
 *
 * @category    IteraResearch
 * @package     IteraResearch_PageToCategory
 * @copyright   Copyright (c) 2003-2015 Itera Research, Inc. All rights reserved. (http://www.itera-research.com/)
 * @license     http://www.gnu.org/licenses Lesser General Public License
 */

class IteraResearch_PageToCategory_Block_Catalog_Navigation extends Mage_Catalog_Block_Navigation
{
    protected $_relation;

    protected function _getRelation()
    {
        if (!$this->_relation) {
            $this->_relation = Mage::getModel('pagetocategory/relation');
        }
        return $this->_relation;
    }

    /**
     * Retrieve child categories of current category
     *
     * @return Mage_Catalog_Model_Resource_Category_Collection
     */
    public function getCurrentChildCategories()
    {
        if (null === $this->_currentChildCategories) {
            $layer = Mage::getSingleton('catalog/layer');
            $category = $layer->getCurrentCategory();
            $this->_currentChildCategories = $category->getChildrenCategories();
            if (!$this->_getRelation()->canShowInLeftNavigation()) {
                // if category has assigned page, the category will be removed from left category navigation, depending on configuration
                /* @var $this->_currentChildCategories Mage_Core_Model_Resource_Db_Collection_Abstract */
                foreach ($this->_currentChildCategories as $cat) {
                    if ($this->_getRelation()->getPageByCategoryId($cat->getId())) {
                        $this->_currentChildCategories->removeItemByKey($cat->getId());
                    }
                }
            }
            $productCollection = Mage::getResourceModel('catalog/product_collection');
            $layer->prepareProductCollection($productCollection);
            $productCollection->addCountToCategories($this->_currentChildCategories);
        }
        return $this->_currentChildCategories;
    }
}
