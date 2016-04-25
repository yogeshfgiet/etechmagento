<?php

class Excellence_Ajaxwishlist_Model_Ajaxwishlist extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('ajaxwishlist/ajaxwishlist');
    }
}