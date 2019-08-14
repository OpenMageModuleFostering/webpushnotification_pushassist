<?php
class Webpushnotification_Pushassist_Adminhtml_Pushassist_CampaignController extends Mage_Adminhtml_Controller_Action
{
	public function indexAction() {
	    $this->loadLayout();
	    $this->_title($this->__("Campaign"));
	    $this->renderLayout();
	}

	
}