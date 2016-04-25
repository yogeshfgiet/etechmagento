<?php
class Excellence_Employee_Block_Employee extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getEmployee()     
     { 
        if (!$this->hasData('employee')) {
            $this->setData('employee', Mage::registry('employee'));
        }
        return $this->getData('employee');
        
    }
}