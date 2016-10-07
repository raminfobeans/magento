<?php
 
class Infobeans_Brand_Block_BrandTest extends PHPUnit_Framework_TestCase
{
  
    private $_block;
    public function setUp()
    {
        /* You'll have to load Magento app in any test classes in this method */
        $app = Mage::app('default');
        /* You will need a layout for block tests */
        $this->_layout = $app->getLayout();
        /* Let's create the block instance for further tests */
        $this->_block = new Infobeans_Brand_Block_Brand;
        /* We are required to set layouts before we can do anything with blocks */
 
                
    }
 
    protected function tearDown()
    {
        $this->_block = NULL;
    }

//    public function addDataProvider() 
//    {
//        return array(array(6), array(0, 0, 0),array(-1, -1, -2));
//    }
// /**
//     * @dataProvider addDataProvider
//     */
   
    
    public function testBrandEnabled()
    {
        $count = $this->_block->getBrand()->getSize();
        $this->assertGreaterThanOrEqual(0,$count); 
    }
    
    public function testVerifyActiveStatus($input,$expected)
    {
        $count = $this->_block->getBrand()->getSize();
        $this->assertEqualS(6,$count);                  // obtained manually from admin brand module
    }        

    public function testVerifyModuleEnabled()
    {
        echo Mage::helper('core/data')->isModuleEnabled('infobeans_Brandsss');

    }       
    
    
}       


