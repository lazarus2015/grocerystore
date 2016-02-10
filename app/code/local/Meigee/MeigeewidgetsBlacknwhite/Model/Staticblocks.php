<?php class Meigee_MeigeewidgetsBlacknwhite_Model_Staticblocks
{
    public function toOptionArray()
    {
        return Mage::getModel('cms/block')->getCollection()->toOptionArray();
    }

}