<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_Model_Relatedpos
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'sidebar', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Sidebar')),
			array('value'=>'bottom', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Bottom (Under collateral block)'))
        );
    }

}