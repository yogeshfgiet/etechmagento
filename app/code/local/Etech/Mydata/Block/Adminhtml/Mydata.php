<?php
class Etech_Mydata_Block_Adminhtml_Mydata extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_mydata';
    $this->_blockGroup = 'mydata';
    $this->_headerText = Mage::helper('mydata')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('mydata')->__('Add Item');
    parent::__construct();
  }
}