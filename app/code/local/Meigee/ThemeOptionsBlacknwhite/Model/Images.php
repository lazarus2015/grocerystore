<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_Model_Images
{
    public function toOptionArray()
    {
        return array(
            array('value'=>999, 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('As Is')),
            array('value'=>333, 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Keep The Same Height')),
            array('value'=>1, 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('1 X 1')),
            array('value'=>1.25, 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('1 X 1.25')),
            array('value'=>1.75, 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('1 X 1.5')),
            array('value'=>2, 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('1 X 2')),
            array('value'=>.5, 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('2 X 1')),
            array('value'=>.75, 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('1 X 0.75')),
            array('value'=>.25, 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('1 X 0.25')),
            array('value'=>0, 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Set your own ratio value...'))        
        );
    }

}