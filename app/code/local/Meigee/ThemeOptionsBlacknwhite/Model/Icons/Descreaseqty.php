<?php
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_Model_Icons_Descreaseqty
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'fa-minus-square-o', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-minus-square-o')),
            array('value'=>'fa-angle-left', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-angle-left')),
            array('value'=>'fa-arrow-left', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-arrow-left')),
            array('value'=>'fa-long-arrow-left', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-long-arrow-left')),
            array('value'=>'fa-step-backward', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-step-backward')),
            array('value'=>'fa-angle-double-left', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-angle-double-left'))
        );
    }

}