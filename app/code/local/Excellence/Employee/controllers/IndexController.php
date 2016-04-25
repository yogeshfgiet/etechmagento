<?php
class Excellence_Employee_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/employee?id=15 
    	 *  or
    	 * http://site.com/employee/id/15 	
    	 */
    	/* 
		$employee_id = $this->getRequest()->getParam('id');

  		if($employee_id != null && $employee_id != '')	{
			$employee = Mage::getModel('employee/employee')->load($employee_id)->getData();
		} else {
			$employee = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($employee == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$employeeTable = $resource->getTableName('employee');
			
			$select = $read->select()
			   ->from($employeeTable,array('employee_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$employee = $read->fetchRow($select);
		}
		Mage::register('employee', $employee);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}