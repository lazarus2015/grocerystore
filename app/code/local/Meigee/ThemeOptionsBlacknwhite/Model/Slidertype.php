<?php
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_Model_Slidertype
{
    public function toOptionArray()
    {
        return array(
            array('value'=>0, 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Wide Slider')),
            array('value'=>1, 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Boxed Slider'))
        );
    }

}