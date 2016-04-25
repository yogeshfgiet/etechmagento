<?php

class Etech_Mydata_Block_Adminhtml_Mydata_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('mydata_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('mydata')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('mydata')->__('Item Information'),
          'title'     => Mage::helper('mydata')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('mydata/adminhtml_mydata_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}