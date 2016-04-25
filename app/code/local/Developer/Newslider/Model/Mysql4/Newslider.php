<?php

class Developer_Newslider_Model_Mysql4_Newslider extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the newslider_id refers to the key field in your database table.
        $this->_init('newslider/newslider', 'newslider_id');
    }
    
    public function loadAllData() {

        $table = $this->getTable('newslider/newslider');
   
        $select = $this->_getReadAdapter()->select()->from(array('profile' => $table));
       $mydata = $this->_getReadAdapter()->fetchAll($select);
     // print_r($mydata);
        return $mydata;
    }
    
}