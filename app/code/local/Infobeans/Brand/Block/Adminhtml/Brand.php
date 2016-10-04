<?php

class Infobeans_Brand_Block_Adminhtml_Brand extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_brand";
	$this->_blockGroup = "brand";
	$this->_headerText = Mage::helper("brand")->__("Brand Manager");
	$this->_addButtonLabel = Mage::helper("brand")->__("Add New Item");
	parent::__construct();
	
	}

}