<?php
class Infobeans_Brand_Block_Adminhtml_Brand_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);

				$fieldset = $form->addFieldset("brand_form", array("legend"=>Mage::helper("brand")->__("Item information")));
				
						$fieldset->addField("name", "text", array(
						"label" => Mage::helper("brand")->__("Name"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "name",
						));
					
					
									
						$fieldset->addField('image', 'image', array(
						'label' => Mage::helper('brand')->__('Image'),
						'name' => 'image',
						'note' => '(*.jpg, *.png, *.gif)',
						));

                                                $fieldset->addField("brand", "editor", array(
						"label" => Mage::helper("brand")->__("Brand"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "brand",

						));
									
						 $fieldset->addField('status', 'select', array(
						'label'     => Mage::helper('brand')->__('Status'),
						'values'   => Infobeans_Brand_Block_Adminhtml_Brand_Grid::getValueArray8(),
						'name' => 'status',
						));

				if (Mage::getSingleton("adminhtml/session")->getBrandData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getBrandData());
					Mage::getSingleton("adminhtml/session")->setBrandData(null);
				} 
				elseif(Mage::registry("brand_data")) {
				    $form->setValues(Mage::registry("brand_data")->getData());
				}
				return parent::_prepareForm();
		}
}
