<?php

class Meigee_MeigeewidgetsBlacknwhite_Block_Fblikebox
extends Mage_Core_Block_Html_Link
implements Mage_Widget_Block_Interface
{
    protected function _construct() {
        parent::_construct();
    }
	protected function _toHtml() {
        return parent::_toHtml();  
    }

    public function getContentLikebox()
    {
        $fbcontent .= 'data-width="300"';
        $fbcontent .= 'data-height="' . $this->getData('height') . '"';
        $fbcontent .= 'data-href="' . $this->getData('href') . '"';
        $fbcontent .= 'data-colorscheme="' . $this->getData('colorscheme') . '"';
        $fbcontent .= 'data-show-faces="' . $this->getData('faces') . '"';
        $fbcontent .= 'data-header="' . $this->getData('header') . '"';
        $fbcontent .= 'data-stream="' . $this->getData('stream') . '"';
        $fbcontent .= 'data-show-border="' . $this->getData('border') . '"';
        return $fbcontent;
    }
}