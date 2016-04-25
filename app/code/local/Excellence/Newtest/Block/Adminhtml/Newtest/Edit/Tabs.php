<?php

class Excellence_Newtest_Block_Adminhtml_Newtest_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('newtest_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('newtest')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('newtest')->__('Item Information'),
          'title'     => Mage::helper('newtest')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('newtest/adminhtml_newtest_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}