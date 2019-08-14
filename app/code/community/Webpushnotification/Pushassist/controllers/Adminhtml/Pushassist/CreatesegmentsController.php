<?php
class Webpushnotification_Pushassist_Adminhtml_Pushassist_CreatesegmentsController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
       $this->loadLayout();
	   $this->_title($this->__("Create Segments"));
	   $this->renderLayout();
    }

    public function addsegmentsAction(){

	$post = $this->getRequest()->getPost();

	if($post){

	    $response_array = array("segment" => array( "segment_name" => urlencode($post['title'])));
	    $result_array = Mage::helper('pushassist')->add_segments($response_array);

	    if($result_array['status'] == 'Success'){
		      $message = $this->__($result_array['response_message']);
		      Mage::getSingleton('adminhtml/session')->addSuccess($message);
		      $this->_redirect('*/pushassist_segments/index');
		      

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


    }
}