<?php
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_Model_Icons_Fancybox
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'fa-search', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-search')),
            array('value'=>'fa-camera', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-camera')),
            array('value'=>'fa-eye', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-eye')),
            array('value'=>'fa-cog', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-cog')),
            array('value'=>'fa-eye-slash', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-eye-slash')),
            array('value'=>'fa-search-plus', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-search-plus'))
        );
    }

}