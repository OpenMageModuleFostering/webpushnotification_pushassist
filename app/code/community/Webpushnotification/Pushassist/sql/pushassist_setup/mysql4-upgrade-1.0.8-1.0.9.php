<?php
$installer = $this;
$installer->startSetup();
$setup = new Mage_Eav_Model_Entity_Setup('core_setup');
$setup->addAttribute('catalog_product', 'push_segment', array(
    'group'         => 'PushAssist Notification',
    'input'         => 'multiselect',
    'type'          => 'text',
    'label'         => 'Segment',
    'frontend'      => '',
    'source'        => 'pushassist/source_option',
    'backend'       => 'pushassist/backend_option',
    'visible'       => true,
    'required'      => false,
    'user_defined' => true,
    'searchable' => 0,
    'filterable' => 0,
    'comparable'    => 0,
    'visible_on_front' => 1,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));
$installer->endSetup();  