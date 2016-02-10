<?php

class Meigee_MeigeewidgetsBlacknwhite_Block_Tabs
extends Mage_Core_Block_Html_Link
implements Mage_Widget_Block_Interface
{
    protected function _construct() {
        parent::_construct();
    }
	protected function _toHtml() {
        return parent::_toHtml();  
    }

    public function getButtonsPos () {
        return $this->getData('buttons_pos');
    }

    

}
