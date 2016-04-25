<?php

class Excellence_Newtest_Block_Adminhtml_Newtest_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'newtest';
        $this->_controller = 'adminhtml_newtest';
        
        $this->_updateButton('save', 'label', Mage::helper('newtest')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('newtest')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('newtest_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'newtest_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'newtest_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('newtest_data') && Mage::registry('newtest_data')->getId() ) {
            return Mage::helper('newtest')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('newtest_data')->getTitle()));
        } else {
            return Mage::helper('newtest')->__('Add Item');
        }
    }
}