<?php

class Developer_Newslider_Block_Adminhtml_Newslider_Edit_Tab_Image extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('newslider_form', array('legend'=>Mage::helper('newslider')->__('Slider Image')));
     
    

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('newslider')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
    
     
      if ( Mage::getSingleton('adminhtml/session')->getNewsliderData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getNewsliderData());
          Mage::getSingleton('adminhtml/session')->setNewsliderData(null);
      } elseif ( Mage::registry('newslider_data') ) {
          $form->setValues(Mage::registry('newslider_data')->getData());
      }
      return parent::_prepareForm();
  }
}