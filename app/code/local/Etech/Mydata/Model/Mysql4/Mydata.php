<?php

class Etech_Mydata_Model_Mysql4_Mydata extends Mage_Core_Model_Mysql4_Abstract {

    public function _construct() {
        // Note that the mydata_id refers to the key field in your database table.
        $this->_init('mydata/mydata', 'mydata_id');
    }

    public function loadAllData() {

        $table = $this->getTable('mydata/profile');
        $table2 = $this->getTable('mydata/user');
        $cond = $this->_getReadAdapter()->quoteInto('profile.user_id = user.user_id', '');
        //$where = $this->_getReadAdapter()->quoteInto('profile.peofile_id = "?"',45);
        $select = $this->_getReadAdapter()->select()->from(array('profile' => $table))->join(array('user' => $table2), $cond);
        $mydata = $this->_getReadAdapter()->fetchAll($select);

        return $mydata;
    }

    public function deleteByCondition($id) {
        $table = $this->getTable('mydata/profile');
        $table2 = $this->getTable('mydata/user');
        $where = array();
        //$where[] =  $this->_getWriteAdapter()->quoteInto('id = ?',$id);
        $where[] = $this->_getWriteAdapter()->quoteInto("user_id = ? ", $id);
        $result = $this->_getWriteAdapter()->delete($table, $where);

        return $result;
    }

    public function selectByCondition($edit_id) {


        $table = $this->getTable('mydata/profile');
        $table2 = $this->getTable('mydata/user');
        $cond = $this->_getReadAdapter()->quoteInto('profile.user_id = user.user_id', '');
        $where = $this->_getReadAdapter()->quoteInto('profile.user_id = ?', $edit_id);
        $select = $this->_getReadAdapter()->select()->from(array('profile' => $table))->join(array('user' => $table2), $cond)->where($where);
        $mydata = $this->_getReadAdapter()->fetchAll($select);
        //print_r($mydata);
        return $mydata;
    }

    public function loginDetail() {
        $table = $this->getTable('mydata/login');
        // $where = $this->_getReadAdapter()->quoteInto("id = ?", 123);
        $select = $this->_getReadAdapter()->select()->from($table)->columns(array('id'))->limit(1)->order('id desc');
     
        $mydata = $this->_getReadAdapter()->fetchAll($select);
        return $mydata;
    }

}
