<?php

class Excellence_Ajaxwishlist_Model_Mysql4_Ajaxwishlist extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the ajaxwishlist_id refers to the key field in your database table.
        $this->_init('ajaxwishlist/ajaxwishlist', 'ajaxwishlist_id');
    }
}