<?php
class Developer_Newslider_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/newslider?id=15 
    	 *  or
    	 * http://site.com/newslider/id/15 	
    	 */
    	/* 
		$newslider_id = $this->getRequest()->getParam('id');

  		if($newslider_id != null && $newslider_id != '')	{
			$newslider = Mage::getModel('newslider/newslider')->load($newslider_id)->getData();
		} else {
			$newslider = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($newslider == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$newsliderTable = $resource->getTableName('newslider');
			
			$select = $read->select()
			   ->from($newsliderTable,array('newslider_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$newslider = $read->fetchRow($select);
		}
		Mage::register('newslider', $newslider);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}