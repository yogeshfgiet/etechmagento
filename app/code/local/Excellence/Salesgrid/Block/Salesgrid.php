<?php
class Excellence_Salesgrid_Block_Salesgrid extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getSalesgrid()     
     { 
        if (!$this->hasData('salesgrid')) {
            $this->setData('salesgrid', Mage::registry('salesgrid'));
        }
        return $this->getData('salesgrid');
        
    }
}