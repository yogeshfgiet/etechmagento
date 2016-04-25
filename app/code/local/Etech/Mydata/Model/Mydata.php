<?php

class Etech_Mydata_Model_Mydata extends Mage_Core_Model_Abstract {

    public function _construct() {
        parent::_construct();
        $this->_init('mydata/mydata');
    }

    public function loadAllData() {
        $data = $this->getResource()->loadAllData();
        return $data;
    }

    public function deleteByCondition($id) {
        return $this->getResource()->deleteByCondition($id);
    }

    public function updateByCondition($edit_id) {

        $data = $this->getResource()->selectByCondition($edit_id);
        return $data;
    }

    public function adminData() {
        $name = Mage::getStoreConfig('testsection/test/name_text', Mage::app()->getStore());
        $status = Mage::getStoreConfig('testsection/test/slider', Mage::app()->getStore());
        $country = Mage::getStoreConfig('testsection/test/patient', Mage::app()->getStore());
        $myData = array($name, $status, $country);
        return $myData;
    }

    public function loginDetails() {


        $collection = $this->getResource()->loginDetail();
        return $collection;
    }

}
