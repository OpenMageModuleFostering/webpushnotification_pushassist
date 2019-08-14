<?php
class Webpushnotification_Pushassist_Block_Script extends Mage_GoogleAnalytics_Block_Ga {

  protected function _toHtml() {

       $html = parent::_toHtml();
       $manual_js=Mage::getStoreConfig('pushassistsection/general/pushassist_js_restrict');

       if ($jsUrl = Mage::getStoreConfig('pushassistsection/general/jsPath') && $manual_js != 1) {
	    $url=Mage::app()->getStore()->getConfig('pushassistsection/general/jsPath');
	   $html.='<!-- Push Notifications for this store is powered by PushAssist. Push Notifications for Chrome, Safari, FireFox, Opera. - Plugin version 1.0.8 - https://pushassist.com/ -->';
           $html .= '<script src="'.$url.'" async></script>';
      
       }
       return $html;
  }

}
