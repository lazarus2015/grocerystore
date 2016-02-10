<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_Model_Related
{
    public function toOptionArray()
    {
        return array(  
            array('value'=>'related', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Simple List')),
            array('value'=>'related_slider', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Slider'))     
        );
    }

}