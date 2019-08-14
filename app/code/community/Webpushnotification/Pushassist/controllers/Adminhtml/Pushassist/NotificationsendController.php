<?php
class Webpushnotification_Pushassist_Adminhtml_Pushassist_NotificationsendController extends Mage_Adminhtml_Controller_Action
{
	public function indexAction() {
	    $this->loadLayout();
	    $this->_title($this->__("Send"));
	    $this->renderLayout();
	}

	public function sendnotificationAction(){ 
		
		$post = $this->getRequest()->getPost();

		
		if(isset($_FILES['fileupload']['name']) && $_FILES['fileupload']['name'] != '') {
			$baseurl=Mage::getBaseUrl( Mage_Core_Model_Store::URL_TYPE_WEB, true );
			$uploader = new Varien_File_Uploader('fileupload');
			$uploader->setAllowedExtensions(array('jpg','jpeg','gif','png'));
			$uploader->setAllowRenameFiles(false);
			$uploader->setFilesDispersion(false);
			$random_digit=rand(0000,9999);
			$new_file_name=$random_digit.$_FILES['fileupload']['name'];
			$path = Mage::getBaseDir('media').DS.'pushassist'.DS;
			$uploader->save($path, $new_file_name);
			$post['fileupload'] = 'pushassist'.DS.$new_file_name; 
			$full_image_path=$baseurl.'media/pushassist/'.$new_file_name;
		}else{
			$full_image_path='';
		}

 	    

	    $response_array = array("notification" => array(
						"siteurl" => Mage::getBaseUrl(),
						"title" => $post['title'],
						"message" => $post['message'],
						"redirect_url" => $post['url'],
						"image" => $full_image_path)
						
		);
    
	    if(isset($post['is_utm_show'])){
		if($post['is_utm_show']==1){

		 $response_array['utm_params'] =array("utm_source" => $post['utm_source'],	// optional
							"utm_medium" => $post['utm_medium'],
							"utm_campaign" => $post['utm_campaign']);
 
		}
 	    }



	      if(!empty($post['segment'])){

	    $response_array['segments'] =$post['segment'];
	    }

		

		$result_array = Mage::helper('pushassist')->send_notification($response_array);

		if($result_array['status'] == 'Success'){
		      $message = $this->__($result_array['response_message']);
		      Mage::getSingleton('adminhtml/session')->addSuccess($message);
		      $this->_redirect('*/pushassist_notificationmain/index');
		      

		} else if($result_array['status'] == 'Error') {
		      
		      $message = $this->__($result_array['error_message']);
		      Mage::getSingleton('adminhtml/session')->addError($message);
		      $this->_redirect('*/*/');
		} else if($result_array['error'] != '') {
		      
		      $message = $this->__($result_array['error']);
		      Mage::getSingleton('adminhtml/session')->addError($message);
		      $this->_redirect('*/*/');
		} 

		else {
		      $message = $this->__($result_array['errors']);
		      Mage::getSingleton('adminhtml/session')->addError($message);
		      $this->_redirect('*/*/');
		      
		}
			
			
	}
}