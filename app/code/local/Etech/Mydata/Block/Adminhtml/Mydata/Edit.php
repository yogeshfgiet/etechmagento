<?php

class Etech_Mydata_Block_Adminhtml_Mydata_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'mydata';
        $this->_controller = 'adminhtml_mydata';
        
        $this->_updateButton('save', 'label', Mage::helper('mydata')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('mydata')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('mydata_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'mydata_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'mydata_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('mydata_data') && Mage::registry('mydata_data')->getId() ) {
            return Mage::helper('mydata')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('mydata_data')->getTitle()));
        } else {
            return Mage::helper('mydata')->__('Add Item');
        }
    }
}