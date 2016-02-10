<?php
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_Model_Icons_Mobilemenu
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'fa-bars', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-bars')),
            array('value'=>'fa-tasks', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-tasks')),
            array('value'=>'fa-align-center', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-align-center')),
            array('value'=>'fa-list-alt', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-list-alt')),
            array('value'=>'fa-align-left', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-align-left')),
            array('value'=>'fa-qrcode', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-qrcode'))
        );
    }

}