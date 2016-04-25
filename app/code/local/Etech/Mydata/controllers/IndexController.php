<?php

class Etech_Mydata_IndexController extends Mage_Core_Controller_Front_Action {

    public function indexAction() {
     
        
      
        
        $id = $this->getRequest()->getParam('id');
        $user_data = Mage::getModel('mydata/user');
        if (!empty($id)) {
            $model = Mage::getModel('mydata/mydata')->deleteByCondition($id);
            $new_model = $user_data->userDeleteData($id);

            try {

                Mage::getSingleton('core/session')->addSuccess("One Row deleted");
                // $this->_redirect('mydata');
            } catch (Exception $e) {
                echo $e->getMessage();
                //  $this->_redirect('mydata');
            }
        }

        $this->loadLayout();
        $this->renderLayout();
    }

    public function insertAction() {
        
        
        

        $post = Mage::app()->getRequest()->getParams();
        $user_data = array('user_name' => $post['user_name']);

        if (!empty($post['user_name'])) {


            $profilermodel = Mage::getModel('mydata/profile');
            $usermodel = Mage::getModel('mydata/user')->insertUserData($user_data)->getId();

            //$insertId = $newmodel->save()->getId();

            if (!empty($usermodel)) {
                $profile_data = array('user_id' => $usermodel, 'first_name' => $post['first_name'], 'last_name' => $post['last_name']);
                $newid = $profilermodel->insertProfileData($profile_data);

                // $insertId2 = $newid->save()->getId();
            }
            Mage::getSingleton('core/session')->addSuccess("Data Inserted Succesfully");
            $this->_redirect('mydata');
        }

        $this->loadLayout();
        $this->renderLayout();
    }

    public function updateAction() {


        $edit_id = $this->getRequest()->getParam('edit_id');
        $post = Mage::app()->getRequest()->getParams();
        $user_data = array('user_name' => $post['user_name'], 'profile_id' => $post['profile_id']);
        $profile_id = $user_data['profile_id'];

        $profile_data = array('first_name' => $post['first_name'], 'last_name' => $post['last_name']);
        if (!empty($post['first_name'])) {

            $profilermodel = Mage::getModel('mydata/profile')->profileData($profile_id, $profile_data);
            $model = Mage::getModel('mydata/user')->myupdateData($user_data, $edit_id);
            try {
                Mage::getSingleton('core/session')->addSuccess("One row Update");
                $this->_redirect('mydata');
            } catch (Exception $e) {
                echo $e->getMessage();
                $this->_redirect('mydata');
            }
        }

        $this->loadLayout();
        $this->renderLayout();
    }
 
       public function loginAction() {


       

        $this->loadLayout();
        $this->renderLayout();
    }

}
