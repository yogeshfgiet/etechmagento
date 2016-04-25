<?php

class Etech_Mydata_Block_Mydata extends Mage_Core_Block_Template {

    protected function _prepareLayout() {
        parent::_prepareLayout();

        $pager = $this->getLayout()->createBlock('page/html_pager', 'custom.pager');
        $pager->setAvailableLimit(array(5 => 5, 10 => 10, 20 => 20, 'all' => 'all'));
        $pager->setCollection($this->getCollection());
        $this->setChild('pager', $pager);
        $this->getCollection()->load();
        return $this;
    }

    public function getMydata() {
        if (!$this->hasData('mydata')) {
            $this->setData('mydata', Mage::registry('mydata'));
        }
        return $this->getData('mydata');
    }

    public function loadAllData() {
        // $model = Mage::getModel('mydata/mydata')->loadAllData();
        //return $model;
    }

    public function loadUpdateData() {

        $edit_id = $this->getRequest()->getParam('edit_id');

        $updata_Data = Mage::getModel('mydata/mydata')->updateByCondition($edit_id);

        return $updata_Data;
    }

    public function __construct() {
        parent::__construct();
        $rows = Mage::getModel('mydata/mydata')->loadAllData();

        $collection = new Varien_Data_Collection();
        foreach ($rows as $row) {
            $rowObj = new Varien_Object();
            $rowObj->setData($row);
            $collection->addItem($rowObj);
        }

        $this->setCollection($collection);
        // parent::_prepareCollection();
    }

    public function getPagerHtml() {
        return $this->getChildHtml('pager');
    }

    public function adminData() {
        $update_Data = Mage::getModel('mydata/mydata')->adminData();
        return $update_Data;
    }

    public function loginDetails() {

        $model = Mage::getModel('mydata/mydata')->loginDetails();

        return $model;
    }

}
