<?php
class Excellence_Pay_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/pay?id=15 
    	 *  or
    	 * http://site.com/pay/id/15 	
    	 */
    	/* 
		$pay_id = $this->getRequest()->getParam('id');

  		if($pay_id != null && $pay_id != '')	{
			$pay = Mage::getModel('pay/pay')->load($pay_id)->getData();
		} else {
			$pay = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($pay == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$payTable = $resource->getTableName('pay');
			
			$select = $read->select()
			   ->from($payTable,array('pay_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$pay = $read->fetchRow($select);
		}
		Mage::register('pay', $pay);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}