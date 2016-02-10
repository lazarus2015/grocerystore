<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_Model_Layout
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'sidebar_left', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Left')),
            array('value'=>'sidebar_right', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Right'))          
        );
    }

}