<?php
class New_Test1_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/test1?id=15 
    	 *  or
    	 * http://site.com/test1/id/15 	
    	 */
    	/* 
		$test1_id = $this->getRequest()->getParam('id');

  		if($test1_id != null && $test1_id != '')	{
			$test1 = Mage::getModel('test1/test1')->load($test1_id)->getData();
		} else {
			$test1 = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($test1 == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$test1Table = $resource->getTableName('test1');
			
			$select = $read->select()
			   ->from($test1Table,array('test1_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$test1 = $read->fetchRow($select);
		}
		Mage::register('test1', $test1);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}