<?php

class Excellence_Salesgrid_Model_Mysql4_Salesgrid extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the salesgrid_id refers to the key field in your database table.
        $this->_init('salesgrid/salesgrid', 'salesgrid_id');
    }
    
    
protected function _beforeLoad()
    {
        $sales_flat_order = $this->getTable('sales/order');
        $sales_flat_order_payment = $this->getTable('sales/order_payment');
        //Getting Shipping Method
        $this->getSelect()->join(array('sfo'=>$sales_flat_order),  'main_table.entity_id =sfo.entity_id',array('shipping_description'=>'sfo.shipping_description'));
        //Getting Payment Method
        $this->getSelect()->join(array('sfop'=>$sales_flat_order_payment),  'main_table.entity_id =sfop.parent_id',array('payment_method'=>'sfop.method'));
        return parent::_beforeLoad();
    }
}