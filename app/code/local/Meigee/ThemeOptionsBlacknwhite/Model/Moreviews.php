<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_Model_Moreviews
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'moreviews', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Simple List')),
            array('value'=>'moreviews_slider', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Slider'))          
        );
    }

}