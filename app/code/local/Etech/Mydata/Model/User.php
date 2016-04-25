<?php

class Etech_Mydata_Model_User extends Mage_Core_Model_Abstract {

    public function _construct() {
        parent::_construct();
        $this->_init('mydata/user');
    }

    public function insertUserData($username) {
        return $this->setData($username)->save();
    }

    public function userDeleteData($id) {
        return $this->setId($id)->delete();
    }

    public function myupdateData($post, $id) {

        return $this->setId($id)->addData($post)->save();
    }

}
