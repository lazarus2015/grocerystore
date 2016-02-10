<?php
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_WishlistController extends Mage_Core_Controller_Front_Action
{
    public function countAction()
    {
		echo MAGE::helper('wishlist')->getItemCount();
    }
}