<?php

class Excellence_Newtest_Model_Newtest extends Mage_Core_Model_Abstract {

    public function _construct() {
        parent::_construct();
        $this->_init('newtest/newtest');
    }

    public function myData() {

        $model = $this->getCollection();
       
        return $model;
    }

    public function deleteData($id) {
        return $this->setId($id)->delete($id);
    }

    public function insertData($post) {
        return $this->setData($post)->save();
    }
    
    
     public function newData() {

        $data = $this->load($edit_id);
      
        return $data;
    }
    public function myupdateData($post,$id) {
        return $this->setId($id)->addData($post)->save();
    }

}

?>