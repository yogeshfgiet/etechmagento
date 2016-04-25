<?php

class Etech_Mydata_Model_Observer {

    public function implementOrderStatus(Varien_Event_Observer $observer) {



        $CustomerName = $observer->getEvent()->getOrder()->getCustomer()->getEmail();
        $orderId = $observer->getEvent()->getOrder()->getIncrementId();
        $dateTime = Mage::getModel('core/date')->date('Y-m-d H:i:s');

        $dataArray = array('order_id' => $orderId, 'cutomer_name' => $CustomerName, 'order_time' => $dateTime);

        $model = Mage::getModel('mydata/neworder')->setData($dataArray);

        try {
            $id = $model->save()->getId();

            // Mage::getSingleton('core/session')->addSuccess($id);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function customerLogin($observer) {


        $event = $observer->getEvent();
        $customer = $event->getCustomer();
        $email = $customer->getEmail();
        $dateTime = Mage::getModel('core/date')->date('Y-m-d H:i:s');
        $dataArray = array('user_name' => $email, 'login_time' => $dateTime);

        $model = Mage::getModel('mydata/login')->setData($dataArray);

        try {
            $id = $model->save()->getId();
            $myValue = $id;
            Mage::getSingleton('core/session')->setMyValue($myValue);

            Mage::getSingleton('core/session')->addSuccess($id);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function customerLogout(Varien_Event_Observer $observer) {

        $event = $observer->getEvent();
        $customer = $event->getCustomer();
        $email = $customer->getEmail();
        $id = $customer->getId();


        $myValue = '';
        $myValue = Mage::getSingleton('core/session')->getMyValue();

        $dateTime = Mage::getModel('core/date')->date('Y-m-d H:i:s');

        //  $dataArray = array('logout_time' => $dateTime);
        $timearray['logout_time'] = $dateTime;
        $model = Mage::getModel('mydata/login')->load($myValue);
        $model->addData($timearray);
        //$model->save();


        try {
            $model->save();
            Mage::getSingleton('core/session')->addSuccess("Row Updated");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}
