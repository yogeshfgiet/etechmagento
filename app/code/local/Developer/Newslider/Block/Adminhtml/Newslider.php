<?php
class Developer_Newslider_Block_Adminhtml_Newslider extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_newslider';
    $this->_blockGroup = 'newslider';
    $this->_headerText = Mage::helper('newslider')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('newslider')->__('Add Item');
    parent::__construct();
  }
}