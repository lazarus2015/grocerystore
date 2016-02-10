<?php class Meigee_MeigeewidgetsBlacknwhite_Model_Buttonspos
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'0', 'label'=>Mage::helper('meigeewidgetsblacknwhite')->__('Top')),
            array('value'=>'1', 'label'=>Mage::helper('meigeewidgetsblacknwhite')->__('Bottom'))
        );
    }

}