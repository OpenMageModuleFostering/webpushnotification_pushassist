To install the Extension please follow the instructions given below:

1. Copy app, js & skin directory into the Magento root folder
2. Clear cache from "var/cache" folder.

To Uninstall the Extension please follow the instructions given below:

1. Delete Below Folders & files from magento root directory

app/code/community/Webpushnotification
app/etc/modules/Webpushnotification_Pushassist.xml
js/pushassist
skin/adminhtml/default/default/pushassist

2. Execute this sql query directly on your database

/*
Please have a backup of your DB before executing the following commands.
Execute this sql query directly on your database to completely remove all Pushassist references.
If you use table name prefixes please change the table names accordingly
*/

DELETE FROM `core_resource` WHERE code ='magikfees_setup';
DELETE FROM `core_config_data` WHERE path ='pushassistsection/general/apikey'
OR path ='pushassistsection/general/secretkey' 
OR path ='pushassistsection/general/subscribers_remain'
OR path ='pushassistsection/general/planType'
OR path ='pushassistsection/general/subscribers_limit'
OR path ='pushassistsection/general/jsPath'
OR path ='pushassistsection/general/pushassist_setting_post_message'
OR path ='pushassistsection/general/pushassist_js_restrict';
