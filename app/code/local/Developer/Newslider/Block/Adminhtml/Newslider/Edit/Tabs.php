<?php

class Developer_Newslider_Block_Adminhtml_Newslider_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('newslider_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('newslider')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('newslider')->__('Item Information'),
          'title'     => Mage::helper('newslider')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('newslider/adminhtml_newslider_edit_tab_form')->toHtml(),
      ));
      $this->addTab('form_image', array(
          'label'     => Mage::helper('newslider')->__('Image'),
          'title'     => Mage::helper('newslider')->__('Image'),
          'content'   => $this->getLayout()->createBlock('newslider/adminhtml_newslider_edit_tab_image')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}