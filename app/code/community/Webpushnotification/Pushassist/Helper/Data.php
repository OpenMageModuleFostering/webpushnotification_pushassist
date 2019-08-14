<?php
class Webpushnotification_Pushassist_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function create_account($create_account_data) {
		
	$create_account_request_json = json_encode($create_account_data);
	$client_create_account = new Zend_Http_Client();   
	$client_create_account->setUri('https://api.pushassist.com/accounts/'); 
	 
	$client_create_account->setHeaders(Zend_Http_Client::CONTENT_TYPE, 'application/json'); 
	$client_create_account->setMethod(Zend_Http_Client::POST);   
	$client_create_account->setRawData($create_account_request_json);   
	$response_create_account = $client_create_account->request()->getBody();
	//print_r($response_create_account);exit;
	return  json_decode($response_create_account,true);
    }
    
    public function check_account_details($login_account_data){

	$check_api_key=$login_account_data['api_key'];
	$check_secret_key=$login_account_data['secret_key'];
	
	$client_account_details = new Zend_Http_Client('https://api.pushassist.com/accounts_info/');
	$client_account_details->setHeaders('X-Auth-Token', $check_api_key);
	$client_account_details->setHeaders('X-Auth-Secret', $check_secret_key); 
	$client_account_details->setHeaders('Content-Type', 'application/json');  
	$client_account_details->setMethod(Zend_Http_Client::GET);  
	$account_details_result=$client_account_details->request()->getRawBody();
	
	return json_decode($account_details_result, true);
      }

    public function get_account_details(){

	$check_api_key=Mage::app()->getStore()->getConfig('pushassistsection/general/apikey');
	$check_secret_key=Mage::app()->getStore()->getConfig('pushassistsection/general/secretkey');
	
	$client_account_details = new Zend_Http_Client('https://api.pushassist.com/accounts_info/');
	$client_account_details->setHeaders('X-Auth-Token', $check_api_key);
	$client_account_details->setHeaders('X-Auth-Secret', $check_secret_key); 
	$client_account_details->setHeaders('Content-Type', 'application/json');  
	$client_account_details->setMethod(Zend_Http_Client::GET);  
	$account_details_result=$client_account_details->request()->getRawBody();
	
	return json_decode($account_details_result, true);
      }
      
      public function get_dashboard(){

	$check_api_key=Mage::app()->getStore()->getConfig('pushassistsection/general/apikey');
	$check_secret_key=Mage::app()->getStore()->getConfig('pushassistsection/general/secretkey');
	

	$client_dashboard = new Zend_Http_Client('https://api.pushassist.com/dashboard/');
	$client_dashboard->setHeaders('X-Auth-Token', $check_api_key);
	$client_dashboard->setHeaders('X-Auth-Secret', $check_secret_key); 
	$client_dashboard->setHeaders('Content-Type', 'application/json');  
	$client_dashboard->setMethod(Zend_Http_Client::GET);  
	$dashboard_result=$client_dashboard->request()->getRawBody();
	
	return json_decode($dashboard_result, true);
      }


    public function send_notification($response_array){

	$check_api_key=Mage::app()->getStore()->getConfig('pushassistsection/general/apikey');
	$check_secret_key=Mage::app()->getStore()->getConfig('pushassistsection/general/secretkey');
	
	$send_notification_request_json = json_encode($response_array);
	$client_send_notification = new Zend_Http_Client();   
	$client_send_notification->setUri('https://api.pushassist.com/notifications/'); 
	$client_send_notification->setHeaders('X-Auth-Token', $check_api_key);
	$client_send_notification->setHeaders('X-Auth-Secret', $check_secret_key); 
	$client_send_notification->setHeaders(Zend_Http_Client::CONTENT_TYPE, 'application/json'); 
	$client_send_notification->setMethod(Zend_Http_Client::POST);   
	$client_send_notification->setRawData($send_notification_request_json);   
	$response_send_notification = $client_send_notification->request()->getBody();
	return  json_decode($response_send_notification,true);	

      }

     public function add_segments($segment_response_array){

	$check_api_key=Mage::app()->getStore()->getConfig('pushassistsection/general/apikey');
	$check_secret_key=Mage::app()->getStore()->getConfig('pushassistsection/general/secretkey');
	$segment_request_json = json_encode($segment_response_array);
	$client_add_segments = new Zend_Http_Client();   
	$client_add_segments->setUri('https://api.pushassist.com/segments/'); 
	$client_add_segments->setHeaders('X-Auth-Token', $check_api_key);
	$client_add_segments->setHeaders('X-Auth-Secret', $check_secret_key); 
	$client_add_segments->setHeaders(Zend_Http_Client::CONTENT_TYPE, 'application/json'); 
	$client_add_segments->setMethod(Zend_Http_Client::POST);   
	$client_add_segments->setRawData($segment_request_json);   
	$response_add_segments = $client_add_segments->request()->getBody();
	return  json_decode($response_add_segments,true);

    }

    public function get_segments(){

	$check_api_key=Mage::app()->getStore()->getConfig('pushassistsection/general/apikey');
	$check_secret_key=Mage::app()->getStore()->getConfig('pushassistsection/general/secretkey');
	
	$client_segments = new Zend_Http_Client('https://api.pushassist.com/segments/');
	$client_segments->setHeaders('X-Auth-Token', $check_api_key);
	$client_segments->setHeaders('X-Auth-Secret', $check_secret_key); 
	$client_segments->setHeaders('Content-Type', 'application/json');  
	$client_segments->setMethod(Zend_Http_Client::GET);  
	$segments_result=$client_segments->request()->getRawBody();
	
	return json_decode($segments_result, true);
    }

    public function get_subscribers(){

	$check_api_key=Mage::app()->getStore()->getConfig('pushassistsection/general/apikey');
	$check_secret_key=Mage::app()->getStore()->getConfig('pushassistsection/general/secretkey');
	
	$client_subscribers = new Zend_Http_Client('https://api.pushassist.com/subscribers/');
	$client_subscribers->setHeaders('X-Auth-Token', $check_api_key);
	$client_subscribers->setHeaders('X-Auth-Secret', $check_secret_key); 
	$client_subscribers->setHeaders('Content-Type', 'application/json');  
	$client_subscribers->setMethod(Zend_Http_Client::GET);  
	$subscribers_result=$client_subscribers->request()->getRawBody();
	
	return json_decode($subscribers_result, true);
    }

    public function get_notifications(){

	$check_api_key=Mage::app()->getStore()->getConfig('pushassistsection/general/apikey');
	$check_secret_key=Mage::app()->getStore()->getConfig('pushassistsection/general/secretkey');

	$client_notifications = new Zend_Http_Client('https://api.pushassist.com/notifications/?per_page=10');
	$client_notifications->setHeaders('X-Auth-Token', $check_api_key);
	$client_notifications->setHeaders('X-Auth-Secret', $check_secret_key); 
	$client_notifications->setHeaders('Content-Type', 'application/json');  
	$client_notifications->setMethod(Zend_Http_Client::GET);  
	$notifications_result=$client_notifications->request()->getRawBody();
	
	return json_decode($notifications_result, true);

	
    }

    public function get_notifications_by_count($counts){

	$check_api_key=Mage::app()->getStore()->getConfig('pushassistsection/general/apikey');
	$check_secret_key=Mage::app()->getStore()->getConfig('pushassistsection/general/secretkey');
	
	$client_notifications_by_count = new Zend_Http_Client('https://api.pushassist.com/notifications/?per_page='.$counts);
	$client_notifications_by_count->setHeaders('X-Auth-Token', $check_api_key);
	$client_notifications_by_count->setHeaders('X-Auth-Secret', $check_secret_key); 
	$client_notifications_by_count->setHeaders('Content-Type', 'application/json');  
	$client_notifications_by_count->setMethod(Zend_Http_Client::GET);  
	$notifications_by_count_result=$client_notifications_by_count->request()->getRawBody();
	
	return json_decode($notifications_by_count_result, true);
    }

    public function get_campaigns(){

	$check_api_key=Mage::app()->getStore()->getConfig('pushassistsection/general/apikey');
	$check_secret_key=Mage::app()->getStore()->getConfig('pushassistsection/general/secretkey');
	
	$client_campaigns = new Zend_Http_Client('https://api.pushassist.com/campaigns');
	$client_campaigns->setHeaders('X-Auth-Token', $check_api_key);
	$client_campaigns->setHeaders('X-Auth-Secret', $check_secret_key); 
	$client_campaigns->setHeaders('Content-Type', 'application/json');  
	$client_campaigns->setMethod(Zend_Http_Client::GET);  
	$campaigns_result=$client_campaigns->request()->getRawBody();
	
	return json_decode($campaigns_result, true);

    }

    public function add_campaigns($campaigns_response_array){

	$check_api_key=Mage::app()->getStore()->getConfig('pushassistsection/general/apikey');
	$check_secret_key=Mage::app()->getStore()->getConfig('pushassistsection/general/secretkey');
  
	$add_campaigns_request_json = json_encode($campaigns_response_array);
	$client_add_campaigns = new Zend_Http_Client();   
	$client_add_campaigns->setUri('https://api.pushassist.com/campaigns/'); 
	$client_add_campaigns->setHeaders('X-Auth-Token', $check_api_key);
	$client_add_campaigns->setHeaders('X-Auth-Secret', $check_secret_key); 
	$client_add_campaigns->setHeaders(Zend_Http_Client::CONTENT_TYPE, 'application/json'); 
	$client_add_campaigns->setMethod(Zend_Http_Client::POST);   
	$client_add_campaigns->setRawData($add_campaigns_request_json);   
	$response_add_campaigns = $client_add_campaigns->request()->getBody();
	return  json_decode($response_add_campaigns,true);
    }
  

}
	 