<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_MeigeewidgetsBlacknwhite_Model_Number
{
    public function toOptionArray()
    {
    	$randId = rand (0, 9999);
        return array(
            array('value'=>$randId, 'label'=>$randId)
        );
    }

}