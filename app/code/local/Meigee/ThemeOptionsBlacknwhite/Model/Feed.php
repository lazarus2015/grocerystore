<?php
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_Model_Feed extends Mage_AdminNotification_Model_Feed
{
    public function getFeedUrl() {
        $url = 
            Mage::getStoreConfigFlag(self::XML_USE_HTTPS_PATH) ? 'https://' : 'http://'
            . 'http://www.meigeeteam.com/templates/blacknwhite-magento-theme/notes.rss';
            return $url;
    }
    
    public function observe() {
    	Mage::getModel('Meigee_ThemeOptionsBlacknwhite_Model_Feed')->checkUpdate();
    }

}