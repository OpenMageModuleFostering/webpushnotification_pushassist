<?php
class Webpushnotification_Pushassist_Adminhtml_Pushassist_CreateaccountController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
       $this->loadLayout();
	   $this->_title($this->__("Create an Account"));
	   $this->renderLayout();
    }
    public function createaccountAction(){ 
		
	$post = $this->getRequest()->getPost();

	$response_array = array("account" => array(
						"name" => trim($post['name']),
						"company_name" => trim($post['company_name']),
						"contact" => trim($post['phone']),
						"email" => trim($post['email']),
						"password" => trim($post['password']),
						"protocol" => trim($post['protocol']),
						"siteurl" => trim($post['site_url']),
						"subdomain" => trim($post['sub_domain'])
					    )
				);
    
	$result_array = Mage::helper('pushassist')->create_account($response_array);

		if($result_array['status'] == 'Success' || $result_array['api_key'] != ''){
		  
		      $account_info=array();
		      $account_info['api_key'] =$result_array['api_key'];
		      $account_info['secret_key'] =$result_array['auth_secret'];

		      $get_account_info = Mage::helper('pushassist')->check_account_details($account_info);
    
		      $apiKey=$get_account_info['apiKey'];
		      $apiSecret=$get_account_info['apiSecret'];
		      $planType=$get_account_info['planType'];
		      $subscribers_limit=$get_account_info['subscribers_limit'];
		      $subscribers_remain=$get_account_info['subscribers_remain'];
		      $jsPath=$get_account_info['jsPath'];

		      if( $apiKey != '' ){
			    Mage::getModel('core/config')->saveConfig('pushassistsection/general/apikey',$apiKey ,'default',0);
		      }
		      if($apiSecret != ''){
			    Mage::getModel('core/config')->saveConfig('pushassistsection/general/secretkey',$apiSecret ,'default',0);
		      }
		      if($subscribers_remain != ''){
			    Mage::getModel('core/config')->saveConfig('pushassistsection/general/subscribers_remain',$subscribers_remain ,'default',0);
		      }
		      if( $planType != '' ){
			    Mage::getModel('core/config')->saveConfig('pushassistsection/general/planType',$planType ,'default',0);
		      }
		      if($subscribers_limit != ''){
			    Mage::getModel('core/config')->saveConfig('pushassistsection/general/subscribers_limit',$subscribers_limit ,'default',0);
		      }
		      if($subscribers_remain != ''){
			    Mage::getModel('core/config')->saveConfig('pushassistsection/general/subscribers_remain',$subscribers_remain ,'default',0);
		      }
		      if($jsPath != ''){
			    Mage::getModel('core/config')->saveConfig('pushassistsection/general/jsPath',$jsPath ,'default',0);
		      }


		      $message = $this->__($result_array['response_message']);
		      Mage::getSingleton('adminhtml/session')->addSuccess($message);
		      Mage::app()->getResponse()->setRedirect(Mage::helper("adminhtml")->getUrl("adminhtml/pushassist_dashboard/index/"));
		      

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

	public function loginAction(){ 
		
	$post = $this->getRequest()->getPost();
	
    
	$result_array = Mage::helper('pushassist')->check_account_details($post);

		if($result_array['status'] == 'Success' || $result_array['apiKey'] != ''){

		    $apiKey=$result_array['apiKey'];
		    $apiSecret=$result_array['apiSecret'];
		    $planType=$result_array['planType'];
		    $subscribers_limit=$result_array['subscribers_limit'];
		    $subscribers_remain=$result_array['subscribers_remain'];
		    $jsPath=$result_array['jsPath'];

		    if( $apiKey != '' ){
			  Mage::getModel('core/config')->saveConfig('pushassistsection/general/apikey',$apiKey ,'default',0);
		    }
		    if($apiSecret != ''){
			  Mage::getModel('core/config')->saveConfig('pushassistsection/general/secretkey',$apiSecret ,'default',0);
		    }
		    if($subscribers_remain != ''){
			  Mage::getModel('core/config')->saveConfig('pushassistsection/general/subscribers_remain',$subscribers_remain ,'default',0);
		    }
		    if( $planType != '' ){
			  Mage::getModel('core/config')->saveConfig('pushassistsection/general/planType',$planType ,'default',0);
		    }
		    if($subscribers_limit != ''){
			  Mage::getModel('core/config')->saveConfig('pushassistsection/general/subscribers_limit',$subscribers_limit ,'default',0);
		    }
		    if($subscribers_remain != ''){
			  Mage::getModel('core/config')->saveConfig('pushassistsection/general/subscribers_remain',$subscribers_remain ,'default',0);
		    }
		    if($jsPath != ''){
			  Mage::getModel('core/config')->saveConfig('pushassistsection/general/jsPath',$jsPath ,'default',0);
		    }

		    $message = $this->__($result_array['response_message']);
		    Mage::getSingleton('adminhtml/session')->addSuccess($message);
		    Mage::app()->getResponse()->setRedirect(Mage::helper("adminhtml")->getUrl("adminhtml/pushassist_dashboard/index/"));
		}
 
		if($result_array['status'] == 'Error') {
		      
		      $message = $this->__($result_array['error_message']);
		      Mage::getSingleton('adminhtml/session')->addError($message);
		      $this->_redirect('*/*/');
		}
		if($result_array['error'] != '') {
		      
		      $message = $this->__($result_array['error']);
		      Mage::getSingleton('adminhtml/session')->addError($message);
		      $this->_redirect('*/*/');
		} 

	}
}