<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_Model_Productpagelayout
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'productpage_small', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Small')),
            array('value'=>'productpage_medium', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Medium')),
            array('value'=>'productpage_large', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Large')),
            array('value'=>'productpage_extralarge', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Extra large'))
        );
    }

}