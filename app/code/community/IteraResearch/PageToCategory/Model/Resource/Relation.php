<?php
/**
 * This file is part of PageToCategory extension.
 *
 * @category    IteraResearch
 * @package     IteraResearch_PageToCategory
 * @copyright   Copyright (c) 2003-2015 Itera Research, Inc. All rights reserved. (http://www.itera-research.com/)
 * @license     http://www.gnu.org/licenses Lesser General Public License
 */

class IteraResearch_PageToCategory_Model_Resource_Relation extends Mage_Core_Model_Resource_Db_Abstract
{
    /**
     * Initialize resource model
     *
     */
    protected function _construct()
    {
        $this->_init('pagetocategory/relation', 'relation_id');
    }

    public function getPageByCategoryId($categoryId)
    {
        $select = $this->_getReadAdapter()->select()
            ->from(array('cp' => $this->getTable('cms/page')), array('cp.title', 'cp.identifier'))
            ->join(
                array('cps' => $this->getTable('cms/page_store')),
                'cp.page_id = cps.page_id',
                array())
            ->join(
                array('r' => $this->getMainTable()),
                'r.page_id = cp.page_id',
                array())
            ->where('cp.is_active = ?', 1)
            ->where('r.category_id = ?', $categoryId)
            ->where('cps.store_id = ?', Mage::app()->getStore()->getId());

        return $this->_getReadAdapter()->fetchRow($select);
    }

    public function canAssignPageToCategory($page, $categoryId)
    {
        $select = $this->_getReadAdapter()->select()
            ->from(array('r' => $this->getMainTable()), 'r.relation_id')
            ->join(
                array('cp' => $this->getTable('cms/page')),
                'r.page_id = cp.page_id',
                array())
            ->join(
                array('cps' => $this->getTable('cms/page_store')),
                'cp.page_id = cps.page_id',
                array())
            ->where('cp.is_active = ?', 1)
            ->where('r.category_id = ?', $categoryId)
            ->where('cp.page_id <> ?', $page->getId())
            ->where('cps.store_id IN (?)', $page->getStores());

        $ids = $this->_getReadAdapter()->fetchCol($select);
        if (count($ids)) {
            return false;
        }
        return true;
    }
}

