<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_Model_Mapblockpos
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'left-top', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Left Top')),
            array('value'=>'right-top', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Right Top')),
			array('value'=>'left-bottom', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Left Bottom')),
			array('value'=>'right-bottom', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Right Bottom'))
        );
    }

}