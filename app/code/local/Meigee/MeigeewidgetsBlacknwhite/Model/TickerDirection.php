<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_MeigeewidgetsBlacknwhite_Model_TickerDirection
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'next', 'label'=>Mage::helper('meigeewidgetsblacknwhite')->__('Next')),
            array('value'=>'prev', 'label'=>Mage::helper('meigeewidgetsblacknwhite')->__('Prev'))
        );
    }

}