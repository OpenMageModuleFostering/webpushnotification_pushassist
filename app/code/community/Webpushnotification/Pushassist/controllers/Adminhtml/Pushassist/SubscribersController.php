<?php
class Webpushnotification_Pushassist_Adminhtml_Pushassist_SubscribersController extends Mage_Adminhtml_Controller_Action
{
	public function indexAction() {
	    $this->loadLayout();
	    $this->_title($this->__("Subscribers"));
	    $this->renderLayout();
	}

	
}