<?php

class Etech_Mydata_Model_Neworder extends Mage_Core_Model_Abstract {

    public function _construct() {
        parent::_construct();
        $this->_init('mydata/neworder');
    }

}
