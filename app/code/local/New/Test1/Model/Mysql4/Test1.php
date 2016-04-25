<?php

class New_Test1_Model_Mysql4_Test1 extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the test1_id refers to the key field in your database table.
        $this->_init('test1/test1', 'test1_id');
    }
}