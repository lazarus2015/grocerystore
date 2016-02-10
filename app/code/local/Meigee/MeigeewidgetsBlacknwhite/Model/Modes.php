<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_MeigeewidgetsBlacknwhite_Model_Modes
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'horizontal', 'label'=>Mage::helper('meigeewidgetsblacknwhite')->__('Horizontal')),
            array('value'=>'vertical', 'label'=>Mage::helper('meigeewidgetsblacknwhite')->__('Vertical')),
            array('value'=>'fade', 'label'=>Mage::helper('meigeewidgetsblacknwhite')->__('Fade'))
        );
    }

}