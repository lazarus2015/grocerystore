<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_Model_Collateral
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'collateral_list', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Simple List')),
            array('value'=>'collateral_tabs', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Tabs')),
			array('value'=>'collateral_tabs_vertical', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Vertical Tabs')),
            array('value'=>'collateral_accordion', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Accordion'))          
        );
    }

}