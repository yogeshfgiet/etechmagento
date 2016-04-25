<?php
class Excellence_Newtest_Block_Adminhtml_Newtest extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_newtest';
    $this->_blockGroup = 'newtest';
    $this->_headerText = Mage::helper('newtest')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('newtest')->__('Add Item');
    parent::__construct();
  }
}