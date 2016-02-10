<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_Model_Currencyswitcher
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'currency_select', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Select Box')),
            array('value'=>'currency_images', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Flags'))          
        );
    }

}