<?php

//print_r($this->getLayout()->getUpdate()->getHandles());

class Infobeans_Testimonial_FormController extends Mage_Core_Controller_Front_Action{
    public function IndexAction() {
      

        $this->loadLayout();   
//        header('Content-Type:text-xml');
//        die($this->getLayout()->getNode()->asXml());
//        print_r($this->getLayout()->getUpdate()->getHandles());
         $this->renderLayout(); 
	  
    }
	
	public function postAction()
	{
            

			$post_data=$this->getRequest()->getPost();
                                
                        
						$_SESSION['testimonial']['name'] = $_POST['name'];
						$_SESSION['testimonial']['email'] = $_POST['email'];
						$_SESSION['testimonial']['testimonial'] = $_POST['testimonial'];

                                                if ($post_data) {
					try {
				 //save image
					try{
				if((bool)$post_data['image']['delete']==1) {
                                    
 					$post_data['image']='';
				}
				else {
					unset($post_data['image']);
				
					if (isset($_FILES)){
				
						if ($_FILES['image']['name']) {
				
							if($this->getRequest()->getParam("id")){
								$model = Mage::getModel("testimonial/testimonial")->load($this->getRequest()->getParam("id"));
								if($model->getData('image')){
										$io = new Varien_Io_File();
										$io->rm(Mage::getBaseDir('media').DS.implode(DS,explode('/',$model->getData('image'))));	
								}
							}
										$path = Mage::getBaseDir('media') . DS . 'testimonial' . DS .'testimonial'.DS;
										$uploader = new Varien_File_Uploader('image');
										$uploader->setAllowedExtensions(array('jpg','png','gif'));
										$uploader->setAllowRenameFiles(false);
										$uploader->setFilesDispersion(false);
										$destFile = $path.$_FILES['image']['name'];
										$filename = $uploader->getNewFileName($destFile);
										$uploader->save($path, $filename);
				
										$post_data['image']='testimonial/testimonial/'.$filename;
						}
					}
				}
        } catch (Exception $e) {
					Mage::getSingleton('customer/session')->addError($e->getMessage());
					$this->_redirect('testimonial/form');
					return;
        }
//save image


						$model = Mage::getModel("testimonial/testimonial");
						$model->addData($post_data);
						if (Mage::getStoreConfig('Infobeans_testimonial/testimonial_general/approve_testimonial')):
							$model->setStatus(1);
						else:
							$model->setStatus(0);
						endif;
						$model->setCreatedTime(Mage::getSingleton('core/date')->gmtDate());
						$model->setUpdateTime(Mage::getSingleton('core/date')->gmtDate());
						$model->setId($this->getRequest()->getParam("id"));
						$model->save();

						Mage::getSingleton("customer/session")->addSuccess("Testimonial was successfully saved");
							$_SESSION['testimonial']['name'] = '';
							$_SESSION['testimonial']['email'] = '';
							$_SESSION['testimonial']['testimonial'] = '';
							unset($_SESSION['testimonial']);

						$this->_redirect("testimonial");
						return;
					} 
					catch (Exception $e) {
						Mage::getSingleton("customer/session")->addError($e->getMessage());
						$this->_redirect('testimonial/form');
					return;
					}

				}
				$this->_redirect("*/*/");
		}
}