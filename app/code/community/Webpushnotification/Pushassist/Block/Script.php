<?php
class Webpushnotification_Pushassist_Block_Script extends Mage_GoogleAnalytics_Block_Ga{

    protected function _toHtml() { 

	$account_response = Mage::helper('pushassist')->get_account_details();

	if($account_response['error'] == ''){
	    $html=parent::_toHtml();
	    $subdomain_name=$account_response['account_name'];
	    if($subdomain_name != ''){
	      $jsPath= 'https://cdn.pushassist.com/account/assets/psa-'.$subdomain_name.'.js';
	      $html .= '<script src="'.$jsPath.'"></script>';
	    }else{
	      $html .='';
	    }
	}else{
	    $html=parent::_toHtml();
	}
	return $html;
    }

}
