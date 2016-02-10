<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_MeigeewidgetsBlacknwhite_Model_Brandslist
{
    public function toOptionArray()
    {

    	$orderby = 'ASC';
    	$attribute = Mage::getModel('eav/entity_attribute')
            ->loadByCode('catalog_product', 'manufacturer');
		$valuesCollection = Mage::getResourceModel('eav/entity_attribute_option_collection')
	        ->setAttributeFilter($attribute->getData('attribute_id'))
			->setStoreFilter(0, false)
			->setPositionOrder( 'ASC' );
			$valuesCollection->getSelect()->order('main_table.sort_order '.$orderby);

		$manufacturers = array();            
		foreach($valuesCollection as $value) {
		    $manufacturers[] = array('value'=>$value->getOptionId() . '=' . $value->getValue(), 'label'=>$value->getValue());
		}
        return $manufacturers;
    }
}