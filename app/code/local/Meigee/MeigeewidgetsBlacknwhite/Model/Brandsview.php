<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_MeigeewidgetsBlacknwhite_Model_Brandsview
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'list', 'label'=>'Simple List'),
            array('value'=>'slider', 'label'=>'Slider')
        );
    }

}