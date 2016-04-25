<?php

class Excellence_Newtest_IndexController extends Mage_Core_Controller_Front_Action {

    public function indexAction() {

        /*
         * Load an object by id 
         * Request looking like:
         * http://site.com/newtest?id=15 
         *  or
         * http://site.com/newtest/id/15 	
         */
        /*
          $newtest_id = $this->getRequest()->getParam('id');

          if($newtest_id != null && $newtest_id != '')	{
          $newtest = Mage::getModel('newtest/newtest')->load($newtest_id)->getData();
          } else {
          $newtest = null;
          }
         */

        /*
         * If no param we load a the last created item
         */
        /*
          if($newtest == null) {
          $resource = Mage::getSingleton('core/resource');
          $read= $resource->getConnection('core_read');
          $newtestTable = $resource->getTableName('newtest');

          $select = $read->select()
          ->from($newtestTable,array('newtest_id','title','content','status'))
          ->where('status',1)
          ->order('created_time DESC') ;

          $newtest = $read->fetchRow($select);
          }
          Mage::register('newtest', $newtest);
         */


        $this->loadLayout();
        $this->renderLayout();

        $id = $this->getRequest()->getParam('id');
        if (!empty($id)) {
            $model = Mage::getModel('newtest/newtest')->deleteData($id);
            try {


                Mage::getSingleton('core/session')->addError("One row Deleted");

                $this->_redirect('newtest');
            } catch (Exception $e) {
                echo $e->getMessage();
                $this->_redirect('newtest');
            }
        }
    }

    public function insertAction() {


        $this->loadLayout();
        $this->renderLayout();
        $post = Mage::app()->getRequest()->getParams();
        if (!empty($post['title'])) {
            $model = Mage::getModel('newtest/newtest')->insertData($post);

            try {

                Mage::getSingleton('core/session')->addSuccess("One row Insertd");
                $this->_redirect('newtest');
            } catch (Exception $e) {
                echo $e->getMessage();
                $this->_redirect('newtest');
            }
        }
    }

    public function updateAction() {

        $this->loadLayout();
        $this->renderLayout();
        $edit_id = $this->getRequest()->getParam('edit_id');
        $post = Mage::app()->getRequest()->getParams();
        if (!empty($post['title'])) {
            $model = Mage::getModel('newtest/newtest')->myupdateData($post, $edit_id);
            try {
                Mage::getSingleton('core/session')->addSuccess("One row Updates");
                $this->_redirect('newtest');
            } catch (Exception $e) {
                echo $e->getMessage();
                $this->_redirect('newtest');
            }
        }
    }

}
