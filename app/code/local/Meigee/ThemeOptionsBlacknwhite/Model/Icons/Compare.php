<?php
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_Model_Icons_Compare
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'fa-signal', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-signal')),
            array('value'=>'fa-compress', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-compress')),
            array('value'=>'fa-exchange', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-exchange')),
            array('value'=>'fa-arrows-alt', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-arrows-alt')),
            array('value'=>'fa-bar-chart-o', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-bar-chart-o')),
            array('value'=>'fa-random', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-random'))
        );
    }

}