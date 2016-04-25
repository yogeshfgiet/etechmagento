<?php

class New_Test1_Model_Mysql4_Test1_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('test1/test1');
    }
}