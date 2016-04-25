<?php

class Excellence_Employee_Block_Adminhtml_Employee_Edit_Tab_Formcustom extends Mage_Adminhtml_Block_Widget_Form {

    protected function _prepareForm() {
        $form = new Varien_Data_Form();
        $this->setForm($form);
         $fieldset = $form->addFieldset('employee_form', array('legend'=>Mage::helper('employee')->__('Item information')));
        $fieldset->addType('custom_field', 'Excellence_Employee_Block_Adminhtml_Employee_Edit_Tab_Field_Custom');
      
        $fieldset->addField('title', 'text', array(
            'label' => Mage::helper('employee')->__('Title'),
            'class' => 'required-entry',
            'required' => false,
            'name' => 'title',
        ));

        $fieldset->addField('custom_field', 'custom_field', array(
            'label' => Mage::helper('employee')->__('Text Box'),
            'name' => 'Textbox',
            'custom1' => 'Custom1 Value',
            'custom2' => 'Custom2 Value',
            'value' => 'value1'
        ));
        
      

        
        if (Mage::getSingleton('adminhtml/session')->getEmployeeData()) {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getEmployeeData());
            Mage::getSingleton('adminhtml/session')->setEmployeeData(null);
        } elseif (Mage::registry('employee_data')) {
            $form->setValues(Mage::registry('employee_data')->getData());
        }
        return parent::_prepareForm();
    }

}
