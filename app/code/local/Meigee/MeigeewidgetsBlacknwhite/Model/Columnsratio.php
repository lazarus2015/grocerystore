<?php class Meigee_MeigeewidgetsBlacknwhite_Model_Columnsratio
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'1', 'label'=>Mage::helper('meigeewidgetsblacknwhite')->__('20/80')),
            array('value'=>'2', 'label'=>Mage::helper('meigeewidgetsblacknwhite')->__('25/75')),
            array('value'=>'3', 'label'=>Mage::helper('meigeewidgetsblacknwhite')->__('30/70')),
			array('value'=>'4', 'label'=>Mage::helper('meigeewidgetsblacknwhite')->__('35/65')),
            array('value'=>'5', 'label'=>Mage::helper('meigeewidgetsblacknwhite')->__('40/60')),
            array('value'=>'6', 'label'=>Mage::helper('meigeewidgetsblacknwhite')->__('45/55')),
			array('value'=>'7', 'label'=>Mage::helper('meigeewidgetsblacknwhite')->__('50/50'))
        );
    }
}