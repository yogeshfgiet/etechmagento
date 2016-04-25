<?php

class Excellence_Pay_Model_Mysql4_Pay extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the pay_id refers to the key field in your database table.
        $this->_init('pay/pay', 'pay_id');
    }
}