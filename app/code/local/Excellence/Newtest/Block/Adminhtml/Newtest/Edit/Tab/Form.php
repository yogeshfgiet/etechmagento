<?php

class Excellence_Newtest_Block_Adminhtml_Newtest_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('newtest_form', array('legend'=>Mage::helper('newtest')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('newtest')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('newtest')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('newtest')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('newtest')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('newtest')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('newtest')->__('Content'),
          'title'     => Mage::helper('newtest')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getNewtestData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getNewtestData());
          Mage::getSingleton('adminhtml/session')->setNewtestData(null);
      } elseif ( Mage::registry('newtest_data') ) {
          $form->setValues(Mage::registry('newtest_data')->getData());
      }
      return parent::_prepareForm();
  }
}