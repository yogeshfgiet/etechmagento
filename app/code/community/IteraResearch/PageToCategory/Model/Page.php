<?php
/**
 * This file is part of PageToCategory extension.
 *
 * @category    IteraResearch
 * @package     IteraResearch_PageToCategory
 * @copyright   Copyright (c) 2003-2015 Itera Research, Inc. All rights reserved. (http://www.itera-research.com/)
 * @license     http://www.gnu.org/licenses Lesser General Public License
 */

class IteraResearch_PageToCategory_Model_Page extends Mage_Cms_Model_Page
{
    /**
     * Processing object after save data
     *
     * @return Mage_Core_Model_Abstract
     */
    protected function _afterSave()
    {
        parent::_afterSave();
        $this->_updateRelations();
        return $this;
    }

    /**
     * Processing object before delete data
     *
     * @return Mage_Core_Model_Abstract
     */
    protected function _beforeDelete()
    {
        $relation = Mage::getModel('pagetocategory/relation');
        $relation->deleteByPageId($this->getId());
        parent::_beforeDelete();
        return $this;
    }

    /**
     * Get category IDs from string
     *
     * @param $ids
     * @return array
     */
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

    /**
     * Create new or delete existing relation,
     * check if category already has assigned page in the same store.
     */
    protected function _updateRelations()
    {
        $request = Mage::app()->getRequest();
        $categoryIds = $request->getParam('category_ids');
        $cids = $this->_getCategoryIds($categoryIds);
        $relationModel = Mage::getModel('pagetocategory/relation');
        $relationModel->validateAssignment($this, $cids);

        /* @var $relations IteraResearch_PageToCategory_Model_Resource_Relation_Collection */
        $relations = $relationModel->getCollection();
        $relations->addFieldToFilter('page_id', $this->getId());

        if ($relations->count() && count($cids)) {
            foreach ($cids as $cid) {
                $cidExist = false;
                foreach ($relations as $rel) {
                    if ($cid == $rel->getCategoryId()) {
                        $cidExist = true;
                    }
                    if (!in_array($rel->getCategoryId(), $cids)) {
                        // delete existing relation(s)
                        $rel->delete();
                    }
                }
                if (!$cidExist) {
                    // update existing or create new relation
                    $newRel = Mage::getModel('pagetocategory/relation');
                    $newRel
                        ->setPageId($this->getId())
                        ->setCategoryId($cid)
                        ->save();
                }
            }
        } elseif (count($cids)) {
            // create new relation(s)
            foreach ($cids as $cid) {
                $newRelation = Mage::getModel('pagetocategory/relation');
                $newRelation
                    ->setPageId($this->getId())
                    ->setCategoryId($cid)
                    ->save();
            }
        } else if ($relations->count()) {
            // delete existing relation(s)
            foreach ($relations as $relation) {
                $relation->delete();
            }
        }
    }
}
