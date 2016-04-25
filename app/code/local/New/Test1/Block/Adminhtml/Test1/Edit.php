<?php

class New_Test1_Block_Adminhtml_Test1_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'test1';
        $this->_controller = 'adminhtml_test1';
        
        $this->_updateButton('save', 'label', Mage::helper('test1')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('test1')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('test1_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'test1_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'test1_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('test1_data') && Mage::registry('test1_data')->getId() ) {
            return Mage::helper('test1')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('test1_data')->getTitle()));
        } else {
            return Mage::helper('test1')->__('Add Item');
        }
    }
}