<?php
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_Model_Icons_Emailfiend
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'fa-envelope-o', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-envelope-o')),
            array('value'=>'fa-envelope', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-envelope')),
            array('value'=>'fa-folder-open', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-folder-open')),
            array('value'=>'fa-share', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-share')),
            array('value'=>'fa-bullhorn', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-bullhorn')),
            array('value'=>'fa-pencil-square-o', 'label'=>Mage::helper('ThemeOptionsBlacknwhite')->__('fa-pencil-square-o'))
        );
    }

}