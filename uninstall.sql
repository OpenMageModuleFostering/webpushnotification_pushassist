/*
Please have a backup of your DB before executing the following commands.
Execute this sql query directly on your database to completely remove all Pushassist references.
If you use table name prefixes please change the table names accordingly
*/

DELETE FROM `core_config_data` WHERE path ='pushassistsection/general/apikey'
OR path ='pushassistsection/general/secretkey' 
OR path ='pushassistsection/general/subscribers_remain'
OR path ='pushassistsection/general/planType'
OR path ='pushassistsection/general/subscribers_limit'
OR path ='pushassistsection/general/jsPath';


DELETE FROM `eav_attribute` WHERE attribute_code ='push_custom_title'
OR attribute_code ='push_custom_message' OR attribute_code ='push_custom_url' OR attribute_code ='check_utm'
OR attribute_code ='push_utm_source' OR attribute_code ='push_utm_medium' OR attribute_code ='push_utm_campaign' OR attribute_code ='enable_push_notification'
OR attribute_code ='push_segment';


DELETE FROM `core_resource` WHERE code ='pushassist_setup';



