<?php

class Infobeans_Brand_Block_Brand extends Mage_Core_Block_Template {

    public function getBrand() {
        $collection = Mage::getModel('brand/brand')->getCollection()
                ->addFieldToFilter('status', array('eq' => 1));
        return $collection;
    }
   public function add($a, $b)
    {
        return $a + $b;
    }


}
