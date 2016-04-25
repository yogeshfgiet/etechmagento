<?php

class Excellence_Ajax_Block_Adminhtml_Ajax_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'ajax';
        $this->_controller = 'adminhtml_ajax';
        
        $this->_updateButton('save', 'label', Mage::helper('ajax')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('ajax')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('ajax_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'ajax_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'ajax_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('ajax_data') && Mage::registry('ajax_data')->getId() ) {
            return Mage::helper('ajax')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('ajax_data')->getTitle()));
        } else {
            return Mage::helper('ajax')->__('Add Item');
        }
    }
}