<?php

class Uchinka_HelloMage_TestController extends Mage_Core_Controller_Front_Action {
    public function indexAction() {
        echo 'Hello Magento';
    }

    public function helloAction() {
        $this->loadLayout();
        $this->renderLayout();
    }
}