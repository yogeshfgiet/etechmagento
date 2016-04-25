<?php
class New_Test1_Block_Test1 extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getTest1()     
     { 
        if (!$this->hasData('test1')) {
            $this->setData('test1', Mage::registry('test1'));
        }
        return $this->getData('test1');
        
    }
}