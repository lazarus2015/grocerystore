<?php
$installer = $this;
$installer->startSetup();
// Mega Menu
$installer->addAttribute('catalog_category', 'meigee_cat_max_quantity', array(
    'group'             => 'Meigee/Enhanced Categories',
    'label'             => 'Max. Quantity of categories in 1 row:',
    'note'              => "Set maximum quantity of categories which will be shown in 1 row. If the field will be empty than default value (System -> Configuration -> Categories Enhanced) will be used.",
    'type'              => 'text',
    'input'             => 'text',
    'visible'           => true,
    'required'          => false,
    'backend'           => '',
    'frontend'          => '',
    'searchable'        => false,
    'filterable'        => false,
    'comparable'        => false,
    'user_defined'      => true,
    'visible_on_front'  => true,
    'wysiwyg_enabled'   => true,
    'is_html_allowed_on_front'  => true,
    'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
	'sort_order' => 0,
));
$installer->endSetup();