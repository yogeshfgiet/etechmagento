<?php

class Excellence_Ship_Model_Mysql4_Ship extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the ship_id refers to the key field in your database table.
        $this->_init('ship/ship', 'ship_id');
    }
}