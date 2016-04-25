<?php

class Etech_Mydata_Model_Profile extends Mage_Core_Model_Abstract {

    public function _construct() {
        parent::_construct();
        $this->_init('mydata/profile');
    }

    public function insertProfileData($post) {
        return $this->setData($post)->save();
    }


    public function profileData($id, $post) {

        return $this->setId($id)->addData($post)->save();
    }

}
