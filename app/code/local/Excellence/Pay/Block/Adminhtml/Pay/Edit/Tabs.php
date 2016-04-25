<?php

class Excellence_Pay_Block_Adminhtml_Pay_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('pay_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('pay')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('pay')->__('Item Information'),
          'title'     => Mage::helper('pay')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('pay/adminhtml_pay_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}