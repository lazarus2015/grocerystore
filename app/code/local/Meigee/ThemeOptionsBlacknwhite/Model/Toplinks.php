<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_Model_Toplinks
{
    public function toOptionArray()
    {
        return array(
            array('value'=>0, 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Custom')),
            array('value'=>1, 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Default'))
        );
    }

}