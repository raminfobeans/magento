<?php
 
class Infobeans_Brand_Block_BrandTest extends PHPUnit_Framework_TestCase
{
    private $brand;
    public function setUp()
    {
  
        $app = Mage::app('default');
        $this->brand = new Infobeans_Brand_Block_BrandTest;
             
      }
    protected function tearDown()
    {
        $this->brand = NULL;
    }

    public function testFirstMethod()
    {
        $result = $this->brand->add(1, 2);
        $this->assertEquals(3, $result);
    }
 

}       
