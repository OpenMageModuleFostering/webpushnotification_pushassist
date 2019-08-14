<?php
class Webpushnotification_Pushassist_Block_Script extends Mage_GoogleAnalytics_Block_Ga{

    protected function _toHtml() { 

	$account_response = Mage::helper('pushassist')->get_account_details();
	$html=parent::_toHtml();
	if($account_response['error'] == '' && $account_response){
	  
	    $jsPath=$account_response['jsPath'];
	      $html .= '<script src="'.$jsPath.'"></script>';
	      
	}
	return $html;
    }

}
