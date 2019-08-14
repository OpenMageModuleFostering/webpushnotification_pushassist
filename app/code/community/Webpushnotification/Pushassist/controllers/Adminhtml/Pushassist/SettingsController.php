<?php
class Webpushnotification_Pushassist_Adminhtml_Pushassist_SettingsController extends Mage_Adminhtml_Controller_Action
{
	public function indexAction() {
	    $this->loadLayout();
	    $this->_title($this->__("Settings"));
	    $this->renderLayout();
	}

	public function settingsAction(){ 
		
	    $post = $this->getRequest()->getPost();
	    if($post){

		  if(isset($_FILES['fileupload']['name']) && $_FILES['fileupload']['name'] != '') {
		      if($_FILES['fileupload']['size'] < 5000){
			$baseurl=Mage::getBaseUrl( Mage_Core_Model_Store::URL_TYPE_WEB, true );
			$uploader = new Varien_File_Uploader('fileupload');
			$uploader->setAllowedExtensions(array('jpg','jpeg','gif','png'));
			$uploader->setAllowRenameFiles(false);
			$uploader->setFilesDispersion(false);
			$random_digit=rand(0000,9999);
			$ext = substr($_FILES['fileupload']['name'], strrpos($_FILES['fileupload']['name'], '.') + 1);
			$new_file_name = time() . '.' . $ext;
			//$new_file_name=$random_digit.$_FILES['fileupload']['name'];
			$path = Mage::getBaseDir('media').DS.'pushassist'.DS.'site'.DS;
			$uploader->save($path, $new_file_name);
			$post['fileupload'] = 'pushassist'.DS.$new_file_name; 
			//$full_image_path=$baseurl.'media/pushassist/site/'.$new_file_name;
			 $full_image_path=base64_encode(file_get_contents($path.$new_file_name));


		    }else{
			$sizemessage='Image Size must be exactly 250x250px.';
			Mage::getSingleton('adminhtml/session')->addError($sizemessage);
			$this->_redirect('*/*/');
			return;

		    }
		}else{
			$new_file_name='';
			$full_image_path='';
		}

		  $response_array = array("templatesetting" => array("interval_time" => $post['pushassist_timeinterval'],
							"opt_in_title" => trim($post['pushassist_opt_in_title']),
							"opt_in_subtitle" => trim($post['pushassist_opt_in_subtitle']),
							"allow_button_text" => trim($post['pushassist_allow_button_text']),
							"disallow_button_text" => trim($post['pushassist_disallow_button_text']),
							"template" => $post['template'],
							"location" => $post['psa_template_location'],
							"image_data" => $full_image_path,	// read image file & pass image data
							"image_name" => trim($new_file_name),
							"child_window_text" => trim($post['pushassist_child_window_text']),
							"child_window_title" => trim($post['pushassist_child_window_title']),
							"child_window_message" => trim($post['pushassist_child_window_message']),
							"notification_title" => trim($post['pushassist_setting_title']),
							"notification_message" => trim($post['pushassist_setting_message']),
							"redirect_url" => trim($post['pushassist_redirect_url']))
						);
	      
		  
		  $response = Mage::helper('pushassist')->settings($response_array);

		  if($response['status'] == 'Success'){
			  $message = $this->__($response['response_message']);
			  Mage::getSingleton('adminhtml/session')->addSuccess($message);
			  $this->_redirect('*/pushassist_settings/index');
			  

		    } else if($response['status'] == 'Error') {
			  
			  $message = $this->__($response['error_message']);
			  Mage::getSingleton('adminhtml/session')->addError($message);
			  $this->_redirect('*/*/');
		    } else if($response['error'] != '') {
			  
			  $message = $this->__($response['error']);
			  Mage::getSingleton('adminhtml/session')->addError($message);
			  $this->_redirect('*/*/');
		    }
		    else {
			  $message = $this->__($response['errors']);
			  Mage::getSingleton('adminhtml/session')->addError($message);
			  $this->_redirect('*/*/');
			  
		    }
	    }
	}

	public function gsmsettingAction(){ 
		
	    $post = $this->getRequest()->getPost();
	    if($post){
		  $response_array = array("accountgcmsetting" => array("project_number" => $post['pushassist_gcm_project_no'],
							"project_api_key" => trim($post['pushassist_gcm_api_key']))
					);
	      
		  $response = Mage::helper('pushassist')->gcm_setting($response_array);

		  if($response['status'] == 'Success'){
			  $message = $this->__($response['response_message']);
			  Mage::getSingleton('adminhtml/session')->addSuccess($message);
			  $this->_redirect('*/pushassist_settings/index');
			  

		    } else if($response['status'] == 'Error') {
			  
			  $message = $this->__($response['error_message']);
			  Mage::getSingleton('adminhtml/session')->addError($message);
			  $this->_redirect('*/*/');
		    } else if($response['error'] != '') {
			  
			  $message = $this->__($response['error']);
			  Mage::getSingleton('adminhtml/session')->addError($message);
			  $this->_redirect('*/*/');
		    }
		    else {
			  $message = $this->__($response['errors']);
			  Mage::getSingleton('adminhtml/session')->addError($message);
			  $this->_redirect('*/*/');
			  
		    }
	    }
	}
}