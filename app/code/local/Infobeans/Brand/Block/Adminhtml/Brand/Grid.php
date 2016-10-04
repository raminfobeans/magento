<?php

class Infobeans_Brand_Block_Adminhtml_Brand_Grid extends Mage_Adminhtml_Block_Widget_Grid {

    public function __construct() {
        parent::__construct();
        $this->setId("brandGrid");
        $this->setDefaultSort("brand_id");
        $this->setDefaultDir("ASC");
        $this->setSaveParametersInSession(true); 
    }

    protected function _prepareCollection() {
        $collection = Mage::getModel("brand/brand")->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns() {
        $this->addColumn("brand_id", array(
            "header" => Mage::helper("brand")->__("ID"),
            "align" => "right",
            "width" => "50px",
            "type" => "number",
            "index" => "brand_id",
        ));

        $this->addColumn("name", array(
            "header" => Mage::helper("brand")->__("Brand Name"),
            "index" => "name",
        ));

        $this->addColumn('status', array(
            'header' => Mage::helper('brand')->__('Status'),
            'index' => 'status',
            'type' => 'options',
            'options' => Infobeans_Brand_Block_Adminhtml_Brand_Grid::getOptionArray8(),
        ));
        

        $this->addColumn("created_time", array(
            "header" => Mage::helper("testimonial")->__("Created Time"),
            "index" => "created_time",
        ));
        $this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV'));
        $this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row) {
        return $this->getUrl("*/*/edit", array("id" => $row->getId()));
    }

    protected function _prepareMassaction() {
        $this->setMassactionIdField('brand_id');
        $this->getMassactionBlock()->setFormFieldName('brand_ids');
        $this->getMassactionBlock()->setUseSelectAll(true);
        $this->getMassactionBlock()->addItem('remove_brand', array(
            'label' => Mage::helper('brand')->__('Remove Brand'),
            'url' => $this->getUrl('*/adminhtml_brand/massRemove'),
            'confirm' => Mage::helper('brand')->__('Are you sure?')
        ));
        return $this;
    }
    
    static public function getOptionArray8() {
        $data_array = array();
        $data_array[0] = 'Disabled';
        $data_array[1] = 'Enabled';
        return($data_array);
    }

    static public function getValueArray8() {
        $data_array = array();
        foreach (Infobeans_Brand_Block_Adminhtml_Brand_Grid::getOptionArray8() as $k => $v) {
            $data_array[] = array('value' => $k, 'label' => $v);
        }
        return($data_array);
    }

}
