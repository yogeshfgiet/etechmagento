<?php
class Developer_Newslider_Block_Newslider extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getNewslider()     
     { 
        if (!$this->hasData('newslider')) {
            $this->setData('newslider', Mage::registry('newslider'));
        }
        return $this->getData('newslider');
        
    }
    
    public function getData(){
        $model=Mage::getModel('newslider/newslider')->getCollection();
       $data=$model->getData();
        return $data;
    }
}