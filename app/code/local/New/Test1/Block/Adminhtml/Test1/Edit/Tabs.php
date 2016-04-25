<?php

class New_Test1_Block_Adminhtml_Test1_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('test1_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('test1')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('test1')->__('Item Information'),
          'title'     => Mage::helper('test1')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('test1/adminhtml_test1_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}