<?php

class Infobeans_Brand_IndexController extends Mage_Core_Controller_Front_Action {

    public function IndexAction() {
        echo "in brand controller";
        $this->loadLayout();
        $this->renderLayout();
    }

    public function BrandAction() {

        $collection = Mage::getModel('brand/brand')->getCollection()
                ->addFieldToFilter('status', array('eq' => 1));
        echo "ddddddddd";
        echo $collection->getSize();
        //print_r( $collection)   ;
    }

}
