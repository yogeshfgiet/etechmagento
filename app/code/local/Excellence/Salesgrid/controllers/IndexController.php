<?php
class Excellence_Salesgrid_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/salesgrid?id=15 
    	 *  or
    	 * http://site.com/salesgrid/id/15 	
    	 */
    	/* 
		$salesgrid_id = $this->getRequest()->getParam('id');

  		if($salesgrid_id != null && $salesgrid_id != '')	{
			$salesgrid = Mage::getModel('salesgrid/salesgrid')->load($salesgrid_id)->getData();
		} else {
			$salesgrid = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($salesgrid == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$salesgridTable = $resource->getTableName('salesgrid');
			
			$select = $read->select()
			   ->from($salesgridTable,array('salesgrid_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$salesgrid = $read->fetchRow($select);
		}
		Mage::register('salesgrid', $salesgrid);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}