<?php
$installer = $this;
$setup = new Mage_Eav_Model_Entity_Setup('core_setup');
$installer->startSetup();

$setup->addAttribute('catalog_product', 'push_custom_title', array(
    'group'         => 'PushAssist Notification',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'Notification Title',
    'default'       => '',
    'frontend'      => '',
    'backend'       => '',
    'visible'       => true,
    'required'      => false,
    'user_defined' => true,
    'searchable' => 1,
    'filterable' => 0,
    'comparable'    => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));
$setup->addAttribute('catalog_product', 'push_custom_message', array(
    'group'         => 'PushAssist Notification',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'Notification Message',
    'default'       => '',
    'frontend'      => '',
    'backend'       => '',
    'note' 	    => 'Default product message.',
    'visible'       => true,
    'required'      => false,
    'user_defined' => true,
    'searchable' => 1,
    'filterable' => 0,
    'comparable'    => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));
$setup->addAttribute('catalog_product', 'push_custom_url', array(
    'group'         => 'PushAssist Notification',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'Custom URL',
    'default'       => '',
    'frontend'      => '',
    'backend'       => '',
    'note' 	    => 'Product landing URL.',
    'visible'       => true,
    'required'      => false,
    'user_defined' => true,
    'searchable' => 1,
    'filterable' => 0,
    'comparable'    => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));
$setup->addAttribute('catalog_product', 'check_utm', array(
        'group'             => 'PushAssist Notification',
        'type'              => 'int',
        'backend'           => '',
        'frontend'          => '',
        'label'             => 'UTM',
        'input'             => 'boolean',
        'class'             => '',
        'source'            => '',
        'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
        'visible'           => true,
        'required'          => false,
        'user_defined'      => true,
        'default'           => '0',
        'searchable'        => false,
        'filterable'        => false,
        'comparable'        => false, 
        'visible_on_front'  => false,
        'unique'            => false,        
        'is_configurable'   => false
    ));
$setup->addAttribute('catalog_product', 'push_utm_source', array(
    'group'         => 'PushAssist Notification',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'UTM Source',
    'default'       => 'pushassist',
    'frontend'      => '',
    'backend'       => '',
    'visible'       => true,
    'required'      => false,
    'user_defined' => true,
    'searchable' => 1,
    'filterable' => 0,
    'comparable'    => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));
$setup->addAttribute('catalog_product', 'push_utm_medium', array(
    'group'         => 'PushAssist Notification',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'UTM Medium',
    'default'       => 'pushassist_notification',
    'frontend'      => '',
    'backend'       => '',
    'visible'       => true,
    'required'      => false,
    'user_defined' => true,
    'searchable' => 1,
    'filterable' => 0,
    'comparable'    => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));
$setup->addAttribute('catalog_product', 'push_utm_campaign', array(
    'group'         => 'PushAssist Notification',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'UTM Campaign',
    'default'       => 'pushassist',
    'frontend'      => '',
    'backend'       => '',
    'visible'       => true,
    'required'      => false,
    'user_defined' => true,
    'searchable' => 1,
    'filterable' => 0,
    'comparable'    => 1,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));

$setup->addAttribute('catalog_product', 'enable_push_notification', array(
        'group'             => 'General',
        'type'              => 'int',
        'backend'           => '',
        'frontend'          => '',
        'label'             => 'Send Notification',
        'input'             => 'boolean',
        'class'             => '',
        'source'            => '',
        'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
        'visible'           => true,
        'required'          => false,
        'user_defined'      => true,
        'default'           => '0',
        'searchable'        => false,
        'filterable'        => false,
        'comparable'        => false, 
        'visible_on_front'  => false,
        'unique'            => false,        
        'is_configurable'   => false
    ));

$installer->endSetup();
	

 