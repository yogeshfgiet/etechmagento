<?php

class Excellence_Ship_Model_Ship extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('ship/ship');
    }
}