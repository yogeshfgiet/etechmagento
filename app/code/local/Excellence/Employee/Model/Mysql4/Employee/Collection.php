<?php

class Excellence_Employee_Model_Mysql4_Employee_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('employee/employee');
    }
}