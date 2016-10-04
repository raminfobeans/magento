<?php
class Infobeans_Testimonial_Block_Adminhtml_Testimonial_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);

				$fieldset = $form->addFieldset("testimonial_form", array("legend"=>Mage::helper("testimonial")->__("Item information")));
				
						$fieldset->addField("name", "text", array(
						"label" => Mage::helper("testimonial")->__("Client Name"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "name",
						));
					
						$fieldset->addField("email", "text", array(
						"label" => Mage::helper("testimonial")->__("Client Email"),
						"name" => "email",
						));
					
									
						$fieldset->addField('image', 'image', array(
						'label' => Mage::helper('testimonial')->__('Image'),
						'name' => 'image',
						'note' => '(*.jpg, *.png, *.gif)',
						));

                                                $fieldset->addField("testimonial", "editor", array(
						"label" => Mage::helper("testimonial")->__("Testimonial"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "testimonial",

						));
									
						 $fieldset->addField('status', 'select', array(
						'label'     => Mage::helper('testimonial')->__('Status'),
						'values'   => Infobeans_Testimonial_Block_Adminhtml_Testimonial_Grid::getValueArray8(),
						'name' => 'status',
						));

				if (Mage::getSingleton("adminhtml/session")->getTestimonialData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getTestimonialData());
					Mage::getSingleton("adminhtml/session")->setTestimonialData(null);
				} 
				elseif(Mage::registry("testimonial_data")) {
				    $form->setValues(Mage::registry("testimonial_data")->getData());
				}
				return parent::_prepareForm();
		}
}
