<?php

class Excellence_Salesgrid_Block_Adminhtml_Salesgrid_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'salesgrid';
        $this->_controller = 'adminhtml_salesgrid';
        
        $this->_updateButton('save', 'label', Mage::helper('salesgrid')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('salesgrid')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('salesgrid_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'salesgrid_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'salesgrid_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('salesgrid_data') && Mage::registry('salesgrid_data')->getId() ) {
            return Mage::helper('salesgrid')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('salesgrid_data')->getTitle()));
        } else {
            return Mage::helper('salesgrid')->__('Add Item');
        }
    }
}