<?php
class Webpushnotification_Pushassist_Adminhtml_Pushassist_CreatecampaignController extends Mage_Adminhtml_Controller_Action
{
	public function indexAction() {
	    $this->loadLayout();
	    $this->_title($this->__("Create Campaign"));
	    $this->renderLayout();
	}

	public function sendcampaignAction(){ 
		$post = $this->getRequest()->getPost();

		//print_r($post);exit;
		if($post['is_utm_show']==0){

		 $post['url']= trim($post['url']).'?utm_source='.$post['utm_source'].'&utm_medium='.$post['utm_medium'].'&utm_campaign='.$post['utm_campaign'];

		}
		


 $response_array = array("campaign" => array(
						"siteurl" => urlencode(Mage::getBaseUrl()),
						"title" => urlencode($post['title']),
						"message" => urlencode($post['message']),
						"redirect_url" => $post['url'],
						"image" => urlencode($new_file_name)),
						"utm_params" => array("utm_source" => urlencode($post['utm_source']),	// optional
							"utm_medium" => urlencode($post['utm_medium']),
							"utm_campaign" => urlencode($post['utm_campaign'])),
						"segments" => urlencode($post['segment'])
		);


		$result_array = Mage::helper('pushassist')->add_campaigns($response_array);


		if($result_array['status'] == 'Success'){
		      $message = $this->__($result_array['response_message']);
		      Mage::getSingleton('adminhtml/session')->addSuccess($message);
		      $this->_redirect('*/pushassist_notificationmain/index');
		      

		} else if($result_array['status'] == 'Error') {
		      
		      $message = $this->__($result_array['error_message']);
		      Mage::getSingleton('adminhtml/session')->addError($message);
		      $this->_redirect('*/*/');
		} else {
		      $message = $this->__($result_array['errors']);
		      Mage::getSingleton('adminhtml/session')->addError($message);
		      $this->_redirect('*/*/');
		}
		
			
			
	}
}