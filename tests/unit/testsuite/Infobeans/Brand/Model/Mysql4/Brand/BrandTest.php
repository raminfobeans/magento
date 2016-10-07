<?php
/* test to check whether module is getting created*/
class Infobeans_Brand_Model_BrandTest extends PHPUnit_Framework_TestCase
{
    private $_model;
        public function setUp()
    {

        echo 'Start unit test for method: ' . $this->getName();
        $app = Mage::app('default');
        $this->_model = Mage::getModel('brand/brand');
                
    }

    protected function tearDown()
    {
        $this->_model = NULL;
    }
    
    public function testBrandCollectionObject()
    {
        $brands = $this->_model->getCollection();
        $this->assertInstanceOf('Infobeans_Brand_Model_Mysql4_Brand_Collection', $brands);
    }

    public function testGetAllBrands()
    {
        $brands = $this->_model->getCollection();
        $this->assertEquals(1, sizeof($brands));
    }
    
    
    
}

