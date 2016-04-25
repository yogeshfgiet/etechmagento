<?php

class Excellence_Ship_Model_Mysql4_Ship_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('ship/ship');
    }
}