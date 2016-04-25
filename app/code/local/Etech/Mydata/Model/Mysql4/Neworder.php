<?php

class Etech_Mydata_Model_Mysql4_Neworder extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the mydata_id refers to the key field in your database table.
        $this->_init('mydata/neworder', 'id');
    }
}
