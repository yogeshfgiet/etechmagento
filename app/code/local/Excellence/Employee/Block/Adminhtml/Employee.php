<?php
class Excellence_Employee_Block_Adminhtml_Employee extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_employee';
    $this->_blockGroup = 'employee';
    $this->_headerText = Mage::helper('employee')->__('Employee Manager');
    $this->_addButtonLabel = Mage::helper('employee')->__('Add Employee');
    parent::__construct();
  }
}