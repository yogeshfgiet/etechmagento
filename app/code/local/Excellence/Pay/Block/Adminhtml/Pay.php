<?php
class Excellence_Pay_Block_Adminhtml_Pay extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_pay';
    $this->_blockGroup = 'pay';
    $this->_headerText = Mage::helper('pay')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('pay')->__('Add Item');
    parent::__construct();
  }
}