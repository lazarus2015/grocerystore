<?php
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_Model_Brandpos
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'sidebar', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Sidebar')),
            array('value'=>'center', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Product Details Col'))
        );
    }

}