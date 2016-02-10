<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_Model_Responsiveness
{
    public function toOptionArray()
    {
        return array(
            array('value'=>1, 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Enabled')),
            array('value'=>1280, 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Disabled. Site width will be set as 1280px ')),
            array('value'=>1008, 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Disabled. Site width will be set as 1008px '))
        );
    }

}