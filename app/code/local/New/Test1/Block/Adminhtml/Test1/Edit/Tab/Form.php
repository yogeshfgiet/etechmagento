<?php

class New_Test1_Block_Adminhtml_Test1_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('test1_form', array('legend'=>Mage::helper('test1')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('test1')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('test1')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('test1')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('test1')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('test1')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('test1')->__('Content'),
          'title'     => Mage::helper('test1')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getTest1Data() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getTest1Data());
          Mage::getSingleton('adminhtml/session')->setTest1Data(null);
      } elseif ( Mage::registry('test1_data') ) {
          $form->setValues(Mage::registry('test1_data')->getData());
      }
      return parent::_prepareForm();
  }
}