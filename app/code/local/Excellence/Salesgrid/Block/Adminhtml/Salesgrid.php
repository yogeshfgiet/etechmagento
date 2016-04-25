<?php
class Excellence_Salesgrid_Block_Adminhtml_Salesgrid extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_salesgrid';
    $this->_blockGroup = 'salesgrid';
    $this->_headerText = Mage::helper('salesgrid')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('salesgrid')->__('Add Item');
    parent::__construct();
  }
}