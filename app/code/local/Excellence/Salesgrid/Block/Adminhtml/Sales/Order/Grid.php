<?php

class Excellence_Salesgrid_Block_Adminhtml_Sales_Order_Grid extends Mage_Adminhtml_Block_Sales_Order_Grid {

    
    
    
      protected function _prepareCollection()
{
    $collection = Mage::getResourceModel($this->_getCollectionClass())
                    ->join(array('soa' => 'sales/order_address'), 'soa.parent_id=main_table.entity_id and soa.address_type = "billing"', array('full_address'=>'CONCAT(soa.firstname, " " , soa.lastname, ",<br/>", soa.street, ",<br/>", soa.city, ",<br/>", soa.region, ",<br/>", soa.postcode)' ), null,'left')
                    ->join(array('soas' => 'sales/order_address'), 'soas.parent_id=main_table.entity_id and soas.address_type = "shipping"', array('full_address_ship'=>'CONCAT(soas.firstname, " " , soas.lastname, ",<br/>", soas.street, ",<br/>", soas.city, ",<br/>", soas.region, ",<br/>", soas.postcode)' ), null,'left');
    $this->setCollection($collection);
    return parent::_prepareCollection();
}
    
    
    
    
    
    
    
    

    protected function _prepareColumns() {

      
        
        
        $this->addColumnAfter('shipping_description', array(
            'header' => Mage::helper('sales')->__('Shipping Method'),
            'index' => 'shipping_description',
                ), 'shipping_name'
        );
        $this->addColumnAfter('method', array(
				'header' => Mage::helper('sales')->__('Payment Method'),
				'index' => 'payment_method',
				'type'  => 'options',
				'options' => Mage::helper('payment')->getPaymentMethodList()
		),'shipping_description');
		return parent::_prepareColumns();
                
     

       
        
        $this->addRssList('rss/order/new', Mage::helper('sales')->__('New Order RSS'));

        $this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV'));
        $this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel XML'));

        return parent::_prepareColumns();
    }

}
