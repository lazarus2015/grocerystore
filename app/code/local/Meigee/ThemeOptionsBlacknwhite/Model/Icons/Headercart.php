<?php
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_Model_Icons_Headercart
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'fa-shopping-cart', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-shopping-cart')),
            array('value'=>'fa-download', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-download')),
            array('value'=>'fa-truck', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-truck')),
            array('value'=>'fa-barcode', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-barcode')),
            array('value'=>'fa-archive', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-archive')),
            array('value'=>'fa-suitcase', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-suitcase'))
        );
    }

}