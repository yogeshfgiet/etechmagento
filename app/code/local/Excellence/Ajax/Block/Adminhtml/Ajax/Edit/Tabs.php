<?php

class Excellence_Ajax_Block_Adminhtml_Ajax_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('ajax_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('ajax')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('ajax')->__('Item Information'),
          'title'     => Mage::helper('ajax')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('ajax/adminhtml_ajax_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}