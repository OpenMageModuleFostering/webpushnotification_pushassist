<?php
class Webpushnotification_Pushassist_Model_Segmentlist extends Mage_Eav_Model_Entity_Attribute_Source_Table
{
      public function getAllOptions()
      {   
             
	  $collection = Mage::helper('pushassist')->get_segments(); 
	  $counter_segment=count($collection);
	  $segments = array();

	  if($counter_segment > 0){
	      foreach ($collection as $get_segment_list) {
		      $segments[] = ( array(
					      'label' => (string) $get_segment_list['name'],
					      'value' => $get_segment_list['id']
				    ));
	      }  
	      return $segments;	
	  }else{
		$segments[] = array(
		    'label' => Mage::helper('pushassist')->__('-- No Segment --'),
		    'value' => ''
		);
		return $segments;	
	  }
      }
}