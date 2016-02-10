<?php
$installer = $this;
$installer->startSetup();
$installer->addAttribute('catalog_category', 'moreviews', array(
    'group'             => 'Meigee/Product Listing',
    'label'             => '"More Views" Button',
    'note'              => 'Enable or disable Button "More Views"',
    'type'              => 'varchar',
    'input'             => 'select',
    'source'            => 'Meigee_CategoriesEnhanced/category_attribute_source_block_enabledisable',
	'sort_order' => 8,
    'visible'           => true,
    'required'          => false,
    'backend'           => '',
    'frontend'          => '',
    'searchable'        => false,
    'filterable'        => false,
    'comparable'        => false,
    'user_defined'      => true,
    'visible_on_front'  => true,
    'wysiwyg_enabled'   => false,
    'is_html_allowed_on_front'  => false,
    'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));
$installer->endSetup();