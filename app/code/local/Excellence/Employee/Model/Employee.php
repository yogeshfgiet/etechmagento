<?php

class Excellence_Employee_Model_Employee extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('employee/employee');
    }
}