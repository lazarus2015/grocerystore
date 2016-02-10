<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_MeigeewidgetsBlacknwhite_Model_Templates
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'meigee/meigeewidgetsblacknwhite/grid.phtml', 'label'=>'Grid'),
            array('value'=>'meigee/meigeewidgetsblacknwhite/list.phtml', 'label'=>'List'),
            array('value'=>'meigee/meigeewidgetsblacknwhite/slider.phtml', 'label'=>'Slider')
        );
    }

}