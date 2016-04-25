<?php

class Developer_Newslider_Model_Newslider extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('newslider/newslider');
    }
    
     public function sliderData()
    {
         
         
         $data = $this->getResource()->loadAllData();
         
         
         return $data;
  
    //eturn $collection;
    }
}