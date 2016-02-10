<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_Model_Productimg
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'zoom', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Cloud Zoom')),
			array('value'=>'slider', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Slider'))
        );
    }

}