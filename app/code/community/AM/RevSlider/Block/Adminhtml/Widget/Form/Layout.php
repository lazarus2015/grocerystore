<?php
/**
 * @category    AM
 * @package     AM_RevSlider
 * @copyright   Copyright (C) 2008-2014 ArexMage.com. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      ArexMage.com
 * @email       support@arexmage.com
 */

class AM_RevSlider_Block_Adminhtml_Widget_Form_Layout
    extends Mage_Adminhtml_Block_Widget
    implements Varien_Data_Form_Element_Renderer_Interface{

    protected $_element;

    public function __construct(){
        parent::__construct();
        $this->setTemplate('am/revslider/widget/form/layout.phtml');
    }

    public function render(Varien_Data_Form_Element_Abstract $element){
        $this->setElement($element);
        return $this->toHtml();
    }

    public function setElement($element){
        $this->_element = $element;
    }

    public function getElement(){
        return $this->_element;
    }
}