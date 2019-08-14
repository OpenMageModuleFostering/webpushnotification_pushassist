<?php
class Webpushnotification_Pushassist_Model_Source_Option
extends Mage_Eav_Model_Entity_Attribute_Source_Table
{
    public function getAllOptions()
    {
        return $this->getOptionFromTable();
    }
 
    private function getOptionFromTable(){
        $return=array();
        
	$col = Mage::helper('pushassist')->get_segments(); 
        /**
        * Given that table has column as id,title,image_name
        *
        */
        foreach($col as $get_segment_list){
          
             if (isset($get_segment_list['name']) && isset($get_segment_list['id'])) {

                array_push($return,array('label'=> $get_segment_list['name'],'value'=> $get_segment_list['id']));
            }
        }
        return $return;
 
    }
 
    public function getOptionText($value)
    {
        $options = $this->getAllOptions();
        foreach ($options as $option) {
            if(is_array($value)){
                if (in_array($option['value'],$value)) {
                    return $option['label'];
                }
            }
            else{
                if ($option['value']==$value) {
                    return $option['label'];
                }
            }
 
        }
        return false;
    }
} 
