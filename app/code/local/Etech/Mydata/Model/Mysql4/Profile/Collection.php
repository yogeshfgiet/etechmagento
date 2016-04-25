<?php

class Etech_Mydata_Model_Mysql4_Profile_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('mydata/profile');
    }
    
    
       public function joinUs() {
     //$collection = Mage::getModel('mydata/profile')->getCollection();
       $table = $this->getMainTable();
        $table2 = $this->getTable('mydata/user');
        $cond = $this->_getReadAdapter()->quoteInto('profile.user_id = user.user_id','');
        //$where = $this->_getReadAdapter()->quoteInto('t1.list_id = "?"',123);
        $select = $this->_getReadAdapter()->select()->from(array('profile'=>$table))->join(array('user'=>$table2), $cond);
        echo $select;
   
   

        
    }
}
