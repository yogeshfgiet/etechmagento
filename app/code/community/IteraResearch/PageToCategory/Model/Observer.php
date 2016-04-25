<?php
/**
 * This file is part of PageToCategory extension.
 *
 * @category    IteraResearch
 * @package     IteraResearch_PageToCategory
 * @copyright   Copyright (c) 2003-2015 Itera Research, Inc. All rights reserved. (http://www.itera-research.com/)
 * @license     http://www.gnu.org/licenses Lesser General Public License
 */

class IteraResearch_PageToCategory_Model_Observer
{
    protected $_relation;

    protected function _getCategoryIds($ids)
    {
        if (null !== $ids) {
            if (empty($ids)) {
                $ids = array();
            }
            if (is_string($ids)) {
                $ids = explode(',', $ids);
            } elseif (!is_array($ids)) {
                Mage::throwException(Mage::helper('catalog')->__('Invalid category IDs.'));
            }
            foreach ($ids as $i => $v) {
                if (empty($v)) {
                    unset($ids[$i]);
                }
            }
            return array_unique($ids);
        }
        return array();
    }

    public function addPagesToTopmenuItems(Varien_Event_Observer $observer)
    {
        if ($this->_getRelation()->canUsePageTitle()) {
            $menu = $observer->getMenu();
            $this->_recurseTree($menu);
        }
    }

    /**
     * Replace category titles and URLs with CMS page titles and URLs.
     *
     * @param Varien_Data_Tree_Node $menuTree
     */
    protected function _recurseTree(Varien_Data_Tree_Node $menuTree)
    {
        $children = $menuTree->getChildren();
        foreach ($children as $child) {
            $catId = (int)str_replace('category-node-', '', $child->getId());
            if ($this->_getRelation()->getPageByCategoryId($catId)) {
                $child->setName($this->_getRelation()->getPageTitleByCategoryId($catId));
            }
            if ($child->hasChildren()) {
                $this->_recurseTree($child);
            }
        }
    }

    protected function _getRelation()
    {
        if (!$this->_relation) {
            $this->_relation = Mage::getModel('pagetocategory/relation');
        }
        return $this->_relation;
    }
}
