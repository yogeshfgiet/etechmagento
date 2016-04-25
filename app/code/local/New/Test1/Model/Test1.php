<?php

class New_Test1_Model_Test1 extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('test1/test1');
    }
}