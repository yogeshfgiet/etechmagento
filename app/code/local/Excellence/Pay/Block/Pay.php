<?php
class Excellence_Pay_Block_Pay extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getPay()     
     { 
        if (!$this->hasData('pay')) {
            $this->setData('pay', Mage::registry('pay'));
        }
        return $this->getData('pay');
        
    }
}