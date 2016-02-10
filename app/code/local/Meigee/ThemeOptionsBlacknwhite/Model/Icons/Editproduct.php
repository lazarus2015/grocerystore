<?php
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_Model_Icons_Editproduct
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'fa-pencil', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-pencil')),
            array('value'=>'fa-eraser', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-eraser')),
            array('value'=>'fa-undo', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-undo')),
            array('value'=>'fa-wrench', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-wrench')),
            array('value'=>'fa-cogs', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-cogs')),
            array('value'=>'fa-pencil-square', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-pencil-square'))
        );
    }

}