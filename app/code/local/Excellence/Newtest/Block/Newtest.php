<?php

class Excellence_Newtest_Block_Newtest extends Mage_Core_Block_Template {

    public function _prepareLayout() {
        return parent::_prepareLayout();
    }

    public function getNewtest() {
        if (!$this->hasData('newtest')) {
            $this->setData('newtest', Mage::registry('newtest'));
        }
        return $this->getData('newtest');
    }

    public function fetchData() {
        $model = Mage::getModel('newtest/newtest')->myData();

        return $model;
    }

    public function updateData() {

        $edit_id = $this->getRequest()->getParam('edit_id');
        $updata_Data = Mage::getModel('newtest/newtest')->load($edit_id);

        return $updata_Data;
    }

}
