<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_Model_Alignment
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'a-left', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Left')),
            array('value'=>'a-right', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Right')),
            array('value'=>'a-center', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Center'))
        );
    }

}