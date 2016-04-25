<?php

class Developer_Newslider_Block_Adminhtml_Newslider_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('newslider_form', array('legend'=>Mage::helper('newslider')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('newslider')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

    
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('newslider')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('newslider')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('newslider')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('newslider')->__('Content'),
          'title'     => Mage::helper('newslider')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
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