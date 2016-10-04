<?php

class Infobeans_Brand_IndexController extends Mage_Core_Controller_Front_Action{
    public function IndexAction() {
          echo "in brand controller";
	  $this->loadLayout();   
          $this->renderLayout(); 
	  
    }
}