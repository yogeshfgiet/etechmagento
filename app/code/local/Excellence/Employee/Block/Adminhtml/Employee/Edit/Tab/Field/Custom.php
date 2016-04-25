<?php

class Excellence_Employee_Block_Adminhtml_Employee_Edit_Tab_Field_Custom extends Varien_Data_Form_Element_Abstract {

    public function __construct($attributes = array()) {
        parent::__construct($attributes);
    }

    public function getElementHtml() {
        $value = $this->getValue();
        $custom1 = $this->getCustom1();
        $custom2 = $this->getCustom1();
        $html = '<p id="' . $this->getHtmlId() . '"' . $this->serialize($this->getHtmlAttributes()) . '>I can put any custom html/javascript here.</p>';
        $html .= "<input type=text placeholder='Enter_your_text' >";
        $html .= "<select>  <option value=volvo>Test1</option><option value=saab>Test2</option></select>";
        $html .= "<p>Here i can access custom fields passed </p>";
        $html .= "<b>Custom1:</b> $custom1 <br/>";
        $html .= "<b>Custom2:</b> $custom2<br/>";
        $html .= $this->getAfterElementHtml();

        return $html;
    }

}
