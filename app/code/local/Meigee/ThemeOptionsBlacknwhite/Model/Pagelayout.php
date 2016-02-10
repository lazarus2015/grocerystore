<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_Model_Pagelayout
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'left', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Left')),
            array('value'=>'right', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Right')),
            array('value'=>'none', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('No Sidebar'))          
        );
    }

}