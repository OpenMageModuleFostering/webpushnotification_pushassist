<?php
class Webpushnotification_Pushassist_Model_Observer
{
    public function handle_adminSystemConfigChangedSection() {

	$check_api_key=Mage::app()->getStore()->getConfig('pushassistsection/general/apikey');
	$check_secret_key=Mage::app()->getStore()->getConfig('pushassistsection/general/secretkey');

	$account_response = Mage::helper('pushassist')->get_account_details();

	if($account_response['error'] == '' && $account_response) {

	    $planType=$account_response['planType'];
	    $subscribers_limit=$account_response['subscribers_limit'];
	    $subscribers_remain=$account_response['subscribers_remain'];
	    $jspath=$account_response['jsPath'];

	    if( $planType != '' ){
		  Mage::getModel('core/config')->saveConfig('pushassistsection/general/planType',$planType ,'default',0);
	    }
	    if($subscribers_limit != ''){
		  Mage::getModel('core/config')->saveConfig('pushassistsection/general/subscribers_limit',$subscribers_limit ,'default',0);
	    }
	    if($subscribers_remain != ''){
		  Mage::getModel('core/config')->saveConfig('pushassistsection/general/subscribers_remain',$subscribers_remain ,'default',0);
	    }
	    if($jspath !=''){
		  Mage::getModel('core/config')->saveConfig('pushassistsection/general/jsPath',$jspath ,'default',0);
	    }
	} else if($account_response['error'] != ''){
		      Mage::getModel('core/config')->saveConfig('pushassistsection/general/apikey','' ,'default',0);
		      Mage::getModel('core/config')->saveConfig('pushassistsection/general/secretkey','' ,'default',0);
		      Mage::getModel('core/config')->saveConfig('pushassistsection/general/planType','' ,'default',0);
		      Mage::getModel('core/config')->saveConfig('pushassistsection/general/subscribers_limit','' ,'default',0);
		      Mage::getModel('core/config')->saveConfig('pushassistsection/general/subscribers_remain','' ,'default',0);
		      Mage::getModel('core/config')->saveConfig('pushassistsection/general/jsPath','' ,'default',0);
		      $message=$account_response['error'];
		      Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__($message));
		      $returnUrl = Mage::helper("adminhtml")->getUrl("adminhtml/system_config/edit/section/pushassistsection");
		      Mage::app()->getResponse()->setRedirect($returnUrl);
		    
	}
	
    }
}  
