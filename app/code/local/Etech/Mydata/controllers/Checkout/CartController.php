<?php

require_once 'Mage/Checkout/controllers/CartController.php';

class Etech_Mydata_Checkout_CartController extends Mage_Checkout_CartController {

    public function indexAction() {

        $this->loadLayout();
        $this->renderLayout();
       
    }

}
