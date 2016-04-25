<?php
class Excellence_Ajaxwishlist_Block_Ajaxwishlist extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getAjaxwishlist()     
     { 
        if (!$this->hasData('ajaxwishlist')) {
            $this->setData('ajaxwishlist', Mage::registry('ajaxwishlist'));
        }
        return $this->getData('ajaxwishlist');
        
    }
}