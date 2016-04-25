<?php

class Yogesh_Test_IndexController extends Mage_Core_Controller_Front_Action {

    public function indexAction() {
        
      
     //$model = Mage::getModel('test/test')->myData();
        
      
      //Insert Data  
       // if(isset($_POST['submit'])){
            
        $post = Mage::app()->getRequest()->getParams();   
          if(!empty($post['title'])){
        $model = Mage::getModel('test/test')->insertData( $post);
        try {
           // $id = $model->save()->getId();
            echo "Data inserted successfully";
             $this->_redirect('test');
        } catch (Exception $e) {
            echo $e->getMessage();
            $this->_redirect('test');
        }
        }
        
        
         
        // Delete Data
        
        $id = $this->getRequest()->getParam('id');
        if (!empty($id)) {
            $model = Mage::getModel('test/test')->deleteData($id);
            try {
               // $model->setId($id)->delete();
                echo "Data deleted successfully.";
                 $this->_redirect('test');
            } catch (Exception $e) {
                echo $e->getMessage();
                  $this->_redirect('test');
            }
        }
       
        
        /*
        
          $post = Mage::app()->getRequest()->getParams();   
          $edit_id = $this->getRequest()->getParam('edit_id');
      
          if(!empty($post['title'])){
         
        $model = Mage::getModel('test/test')->load($edit_id)->addData($post);
        try {
           $model->setId($edit_id)->save();
            echo "Data updated successfully.";
            $url = 'http://127.0.0.1/etechmagento/index.php/test';
            Mage::app()->getFrontController()->getResponse()->setRedirect($url);
        } catch (Exception $e) {
            echo $e->getMessage();
            $url = 'http://127.0.0.1/etechmagento/index.php/test';
            Mage::app()->getFrontController()->getResponse()->setRedirect($url);
        }
    }
              
    */    
      
        $this->loadLayout();
        $this->renderLayout();
        
   
        
    }

        

}
