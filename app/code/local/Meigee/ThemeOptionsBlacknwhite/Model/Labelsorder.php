<?php
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_Model_labelsorder
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'new_sale', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('New, On sale')),
            array('value'=>'sale_new', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('On sale, New'))
        );
    }

}