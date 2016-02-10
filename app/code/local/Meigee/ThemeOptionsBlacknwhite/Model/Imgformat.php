<?php
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_Model_Imgformat
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'.png', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('.png')),
            array('value'=>'.jpg', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('.jpg')),
            array('value'=>'.gif', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('.gif'))          
        );
    }

}