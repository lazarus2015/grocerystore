<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_Model_Collateralposition
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'details', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Product Details Col')),
            array('value'=>'underdetails', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('Under Product Details Col'))          
        );
    }

}