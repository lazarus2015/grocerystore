<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_Model_Sticky
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'sticky-logo', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Logo')),
            array('value'=>'sticky-nav', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Navigation Menu')),
            array('value'=>'sticky-cart', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Cart')),
			array('value'=>'sticky-search', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Search box'))
        );
    }

}