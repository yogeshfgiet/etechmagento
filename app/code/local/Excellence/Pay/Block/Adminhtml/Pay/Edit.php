<?php

class Excellence_Pay_Block_Adminhtml_Pay_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'pay';
        $this->_controller = 'adminhtml_pay';
        
        $this->_updateButton('save', 'label', Mage::helper('pay')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('pay')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('pay_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'pay_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'pay_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('pay_data') && Mage::registry('pay_data')->getId() ) {
            return Mage::helper('pay')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('pay_data')->getTitle()));
        } else {
            return Mage::helper('pay')->__('Add Item');
        }
    }
}