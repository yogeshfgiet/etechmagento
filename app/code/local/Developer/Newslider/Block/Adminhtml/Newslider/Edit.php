<?php

class Developer_Newslider_Block_Adminhtml_Newslider_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'newslider';
        $this->_controller = 'adminhtml_newslider';
        
        $this->_updateButton('save', 'label', Mage::helper('newslider')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('newslider')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('newslider_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'newslider_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'newslider_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('newslider_data') && Mage::registry('newslider_data')->getId() ) {
            return Mage::helper('newslider')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('newslider_data')->getTitle()));
        } else {
            return Mage::helper('newslider')->__('Add Item');
        }
    }
}