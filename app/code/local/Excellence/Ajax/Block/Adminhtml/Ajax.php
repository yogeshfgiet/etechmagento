<?php
class Excellence_Ajax_Block_Adminhtml_Ajax extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_ajax';
    $this->_blockGroup = 'ajax';
    $this->_headerText = Mage::helper('ajax')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('ajax')->__('Add Item');
    parent::__construct();
  }
}