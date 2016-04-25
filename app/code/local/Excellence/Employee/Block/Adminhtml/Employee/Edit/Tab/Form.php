<?php

class Excellence_Employee_Block_Adminhtml_Employee_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('employee_form', array('legend'=>Mage::helper('employee')->__('Item information')));
      
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('employee')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('employee')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('employee')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('employee')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('employee')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('employee')->__('Content'),
          'title'     => Mage::helper('employee')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getEmployeeData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getEmployeeData());
          Mage::getSingleton('adminhtml/session')->setEmployeeData(null);
      } elseif ( Mage::registry('employee_data') ) {
          $form->setValues(Mage::registry('employee_data')->getData());
      }
      return parent::_prepareForm();
  }
}