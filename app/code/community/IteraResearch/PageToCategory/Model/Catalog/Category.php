<?php
/**
 * This file is part of PageToCategory extension.
 *
 * @category    IteraResearch
 * @package     IteraResearch_PageToCategory
 * @copyright   Copyright (c) 2003-2015 Itera Research, Inc. All rights reserved. (http://www.itera-research.com/)
 * @license     http://www.gnu.org/licenses Lesser General Public License
 */

class IteraResearch_PageToCategory_Model_Catalog_Category extends Mage_Catalog_Model_Category
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
     * Get category url
     *
     * @return string
     */
    public function getUrl()
    {
        if (!Mage::app()->getStore()->isAdmin()) {
            if ($this->_getRelation()->getPageByCategoryId($this->getId())) {
                return $this->_getRelation()->getPageUrlByCategoryId($this->getId());
            }
        }
        return parent::getUrl();
    }

    /**
     * Retrieve Name data wrapper
     *
     * @return string
     */
    public function getName()
    {
        if (!Mage::app()->getStore()->isAdmin() && $this->_getRelation()->canUsePageTitle()) {
            if ($this->_getRelation()->getPageByCategoryId($this->getId())) {
                return $this->_getRelation()->getPageTitleByCategoryId($this->getId());
            }
        }
        return parent::getName();
    }

    protected function _beforeDelete()
    {
        $this->_getRelation()->deleteByCategoryId($this->getId());
        parent::_beforeDelete();
        return $this;
    }
}
