<?php

class Excellence_Salesgrid_Model_Mysql4_Salesgrid_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('salesgrid/salesgrid');
    }
}