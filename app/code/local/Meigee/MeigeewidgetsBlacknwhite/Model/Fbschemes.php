<?php class Meigee_MeigeewidgetsBlacknwhite_Model_Fbschemes
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'light', 'label'=>Mage::helper('meigeewidgetsblacknwhite')->__('Light')),
            array('value'=>'dark', 'label'=>Mage::helper('meigeewidgetsblacknwhite')->__('Dark')),
        );
    }

}