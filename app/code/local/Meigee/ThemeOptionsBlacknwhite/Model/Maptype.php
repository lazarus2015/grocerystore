<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_Model_Maptype
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'ROADMAP', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Normal street map')),
            array('value'=>'SATELLITE', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Satellite images')),
			array('value'=>'TERRAIN', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Map with physical features'))
        );
    }

}