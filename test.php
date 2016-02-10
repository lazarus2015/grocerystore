<?php 
// require_once('app/Mage.php');
// Mage::app()->setCurrentStore(Mage::getModel('core/store')->load(Mage_Core_Model_App::ADMIN_STORE_ID));
// $installer = new Mage_Eav_Model_Entity_Setup('default_setup');
// $installer->startSetup();

// $attribute  = array(
//     'type' => 'text',
//     'label'=> 'Bringg User',
//     'input' => 'multiselect',
//     'backend' => 'eav/entity_attribute_backend_array',
//     'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
//     'visible' => true,
//     'required' => false,
//     'user_defined' => true,
//     'default' => "",
//     'sort_order' => 5,
//     'group' => "General Information",
//     'option' => array ( 
//         'value' => array(
//             'stockboy' => array('Stockboy'), 
//             'driver' => array('Driver'), 
//             'butcher' => array('Butcher'), 
//             'kitchen' => array('Kitchen')
//         ) 
//     )
// );
// // $installer->removeAttribute('catalog_product', 'bringg_user');
// $installer->addAttribute(Mage_Catalog_Model_Category::ENTITY, 'bringg_user', $attribute);

// $installer->endSetup();
require_once('app/Mage.php');
Mage::app()->setCurrentStore(Mage::getModel('core/store')->load(Mage_Core_Model_App::ADMIN_STORE_ID));
$installer = new Mage_Sales_Model_Mysql4_Setup;
$attribute  = array(
'type'          => 'varchar',
'backend_type'  => 'varchar',
'frontend_input' => 'varchar',
'is_user_defined' => true,
'label'         => 'Cron check',
'visible'       => true,
'required'      => false,
'user_defined'  => false,
'searchable'    => false,
'filterable'    => false,
'comparable'    => false,
'default'       => ''
);
$installer->addAttribute('order', 'cron_check', $attribute);
// $installer->addAttribute('quote', 'delivery_date', $attribute);
$installer->updateAttribute('order', 'delivery_date',  array('type'=>'datetime'));
$installer->endSetup();
echo 'sadas';