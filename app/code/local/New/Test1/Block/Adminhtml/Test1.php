<?php
class New_Test1_Block_Adminhtml_Test1 extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_test1';
    $this->_blockGroup = 'test1';
    $this->_headerText = Mage::helper('test1')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('test1')->__('Add Item');
    parent::__construct();
  }
}