<?php
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_MoreviewsController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
		$productId  = (int) $this->getRequest()->getParam('product'); //get parameter from url request
		Mage::helper('catalog/product')->initProduct($productId, $this); //select product by id and initialize its
		$this->loadLayout(); //load page layouts
		$this->renderLayout(); //render the page
    }
}