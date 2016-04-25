<?php

class Excellence_Ajaxwishlist_Block_Adminhtml_Ajaxwishlist_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('ajaxwishlist_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('ajaxwishlist')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('ajaxwishlist')->__('Item Information'),
          'title'     => Mage::helper('ajaxwishlist')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('ajaxwishlist/adminhtml_ajaxwishlist_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}