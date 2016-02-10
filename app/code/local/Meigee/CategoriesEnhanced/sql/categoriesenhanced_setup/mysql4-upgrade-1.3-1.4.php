<?php
$installer = $this;
$installer->startSetup();
$installer->addAttribute('catalog_category', 'meigee_cat_bg', array(
	 'group'             => 'Meigee/Enhanced Categories',
	 'sort_order'    => 9,
	 'input'         => 'image',
	 'type'          => 'varchar',
	 'label'         => 'Upload your top level category background image',
	 'note'          => 'Will add background image which will be shown as megamenu wrapper. Works only for top level categories.',
	 'backend'       => 'catalog/category_attribute_backend_image',
	 'visible'       => 1,
	 'required'      => 0,
	 'user_defined'  => 1,
	 'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));
$installer->addAttribute('catalog_category', 'meigee_cat_bg_retina', array(
	 'group'             => 'Meigee/Enhanced Categories',
	 'sort_order'    => 10,
	 'input'         => 'image',
	 'type'          => 'varchar',
	 'label'         => 'Upload your top level category Retina background image',
	 'note'          => 'Will add background image which will be shown as megamenu wrapper. Works only for top level categories.',
	 'backend'       => 'catalog/category_attribute_backend_image',
	 'visible'       => 1,
	 'required'      => 0,
	 'user_defined'  => 1,
	 'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));
$installer->addAttribute('catalog_category', 'meigee_cat_bg_option', array(
    'group'             => 'Meigee/Enhanced Categories',
    'label'             => 'Category Background Image Location Option',
    'note'              => 'Set the position for category background image.',
    'type'              => 'varchar',
    'input'             => 'select',
    'source'            => 'Meigee_CategoriesEnhanced/category_attribute_source_block_bg',
    'default_value' => '1',
	'sort_order' => 11,
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