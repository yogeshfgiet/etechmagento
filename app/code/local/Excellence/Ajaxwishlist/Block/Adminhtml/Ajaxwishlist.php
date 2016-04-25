<?php
class Excellence_Ajaxwishlist_Block_Adminhtml_Ajaxwishlist extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_ajaxwishlist';
    $this->_blockGroup = 'ajaxwishlist';
    $this->_headerText = Mage::helper('ajaxwishlist')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('ajaxwishlist')->__('Add Item');
    parent::__construct();
  }
}