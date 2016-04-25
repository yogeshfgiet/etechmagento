<?php

class Excellence_Employee_Block_Adminhtml_Employee_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('employee_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('employee')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('employee')->__('Item Information'),
          'title'     => Mage::helper('employee')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('employee/adminhtml_employee_edit_tab_form')->toHtml(),
      ));
      
      $this->addTab('form_section_new', array(
          'label'     => Mage::helper('employee')->__('employee Information'),
          'title'     => Mage::helper('employee')->__('employee Information'),
          'content'   => $this->getLayout()->createBlock('employee/adminhtml_employee_edit_tab_formnew')->toHtml(),
      ));
     $this->addTab('form_section2', array(
          'label'     => Mage::helper('employee')->__('Item Information2'),
          'title'     => Mage::helper('employee')->__('Item Information2'),
          'content'   => $this->getLayout()->createBlock('employee/adminhtml_employee_edit_tab_formcustom')->toHtml(),
        ));
 
        $this->addTab('form_section3', array(
                'label'     => Mage::helper('employee')->__('Item Information3'),
                'url'       => $this->getUrl('*/*/form', array('_current' => true)),
                'class'     => 'ajax',
        ));

     
        
     
      return parent::_beforeToHtml();
      
      
  }
}