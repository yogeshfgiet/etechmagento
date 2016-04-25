<?php

class Excellence_Salesgrid_Block_Adminhtml_Salesgrid_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('salesgrid_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('salesgrid')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('salesgrid')->__('Item Information'),
          'title'     => Mage::helper('salesgrid')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('salesgrid/adminhtml_salesgrid_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}