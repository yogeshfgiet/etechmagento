<?php

class Excellence_Pay_Model_Mysql4_Pay_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('pay/pay');
    }
}