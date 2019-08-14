<?php
class Webpushnotification_Pushassist_Model_Observer
{
    
    public function addNewproduct($observer) {

        $product = $observer->getEvent()->getProduct();
	$enable_notification=$product->getEnablePushNotification();
	
	// Custom Title
	$product_custom_title=$product->getPushCustomTitle();
	if($product_custom_title != ''){
	    $product_notification_title=$product->getPushCustomTitle();
	}else{
	    $product_notification_title=$product->getName();
	}

	// Custom Message
	$product_custom_message=$product->getPushCustomMessage();
        $prod_short_message=$product->getShortDescription();
	$global_setting_message=Mage::app()->getStore()->getConfig('pushassistsection/general/pushassist_setting_post_message');

	if($product_custom_message != ''){ 
	     $pushassist_setting_post_message=$product->getPushCustomMessage();
	}elseif($prod_short_message != ''){
	    $pushassist_setting_post_message=$product->getShortDescription();
	}elseif($global_setting_message != '' ){ 
	    $pushassist_setting_post_message=Mage::app()->getStore()->getConfig('pushassistsection/general/pushassist_setting_post_message');
	}

	//Custom URL
	$product_custom_url=$product->getPushCustomUrl();
	if($product_custom_url != ''){
	   $product_notification_url=$product->getPushCustomUrl();
	}else{
	  // $product_notification_url=Mage::getBaseUrl( Mage_Core_Model_Store::URL_TYPE_WEB, true ).$product->getUrlPath();
	         $suffix = Mage::getStoreConfig('catalog/seo/product_url_suffix');
		 $product_notification_url = Mage::getUrl().$product->getUrlKey().$suffix;
	}
	
	//Product Image
	$_product = Mage::getModel('catalog/product')->load($product->getId());
	$productMediaConfig = Mage::getModel('catalog/product_media_config');
	$baseImageUrl = $productMediaConfig->getMediaUrl($_product->getImage());
	$smallImageUrl = $productMediaConfig->getMediaUrl($_product->getSmallImage());
	$thumbnailUrl = $productMediaConfig->getMediaUrl($_product->getThumbnail());
	$image_full_path='';

	if($baseImageUrl !='' && $_product->getImage() != 'no_selection'){
	  $image_full_path=$baseImageUrl;
	}elseif($smallImageUrl !='' && $_product->getSmallImage() != 'no_selection'){
	  $image_full_path=$smallImageUrl;
	}elseif($thumbnailUrl !='' && $_product->getThumbnail() != 'no_selection'){
	  $image_full_path=$thumbnailUrl;
	}

	$response_array = array("notification" => array(
						"title" => $product_notification_title,
						"message" => $pushassist_setting_post_message,
						"redirect_url" => $product_notification_url,
						"image" => $image_full_path)
	);
		
	$product_utm=$product->getCheckUtm();
	
	if(isset($product_utm)) {

		if($product_utm==1) {

		    $product_utm_source=$product->getCheckUtmSource();
		    if(isset($product_utm_source) && $product_utm_source !='') {
			    $product_utm_source=$product->getCheckUtmSource();
		    }else{
			    $product_utm_source='pushassist';
		    }

		    $product_utm_medium=$product->getCheckUtmMedium();
		    if(isset($product_utm_medium) && $product_utm_medium !='') {
			    $product_utm_medium=$product->getCheckUtmMedium();
		    }else{
			    $product_utm_medium='pushassist_notification';
		    }

		    $product_utm_campaign=$product->getCheckUtmCampaign();
		    if(isset($product_utm_campaign) && $product_utm_campaign !='') {
			    $product_utm_campaign=$product->getCheckUtmCampaign();
		    }else{
			    $product_utm_campaign='pushassist';
		    }
		    
		    $response_array['utm_params'] =array("utm_source" => $product_utm_source,	// optional
							"utm_medium" => $product_utm_medium,
							"utm_campaign" => $product_utm_campaign);
		}
 	}

	if($enable_notification==1 &&$product->getStatus()==1 && $product->getVisibility()==4 ){

		 $result_array = Mage::helper('pushassist')->send_notification($response_array);
	}
    }
}  
