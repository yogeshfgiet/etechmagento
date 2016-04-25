<?php

class Excellence_Ajaxwishlist_Block_Adminhtml_Ajaxwishlist_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('ajaxwishlist_form', array('legend'=>Mage::helper('ajaxwishlist')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('ajaxwishlist')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('ajaxwishlist')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('ajaxwishlist')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('ajaxwishlist')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('ajaxwishlist')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('ajaxwishlist')->__('Content'),
          'title'     => Mage::helper('ajaxwishlist')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getAjaxwishlistData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getAjaxwishlistData());
          Mage::getSingleton('adminhtml/session')->setAjaxwishlistData(null);
      } elseif ( Mage::registry('ajaxwishlist_data') ) {
          $form->setValues(Mage::registry('ajaxwishlist_data')->getData());
      }
      return parent::_prepareForm();
  }
}