<?php
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_MeigeewidgetsBlacknwhite_Block_Saleproducts
extends Mage_Catalog_Block_Product_Abstract
implements Mage_Widget_Block_Interface
{
    protected $products;

    protected function _construct() {
        parent::_construct();
    }

    protected function catId()
    {
        $cat = explode("/", $this->getData('featured_category'));     
		return $cat[0];
    }
    public function catName () {
        return Mage::getModel('catalog/category')->load($this->catId());
    }

    public function productsAmount () {
        return $this->getData('products_amount');
    }

   public function addToCart() {
		return $this->getData('add_to_cart');
	}

	public function productPrice() {
		return $this->getData('price');
	}

	public function productName() {
		return $this->getData('product_name');
	}

	public function quickView() {
		return $this->getData('quickview');
	}

	public function wishlist() {
		return $this->getData('wishlist');
	}
	
	public function compareProducts() {
		return $this->getData('compare');
	}

	public function ratingStars() {
		return $this->getData('rating_stars');
	}
	
	public function ratingCustLink() {
		return $this->getData('rating_cust_link');
	}
	
	public function ratingAddReviewLink() {
		return $this->getData('rating_add_review_link');
	}

	public function productsPerRow() {
		return $this->getData('products_per_row');
	}

	public function productLink() {
		return $this->getData('product_link');
	}

	public function getColumnsRatio(){
		return $this->getData('columns_ratio');
	}
	public function getMoreviews(){
		return $this->getData('moreviews');
	}

    public function getMyCollection () {
        $todayStartOfDayDate  = Mage::app()->getLocale()->date()
            ->setTime('00:00:00')
            ->toString(Varien_Date::DATETIME_INTERNAL_FORMAT);

        $todayEndOfDayDate  = Mage::app()->getLocale()->date()
            ->setTime('23:59:59')
            ->toString(Varien_Date::DATETIME_INTERNAL_FORMAT);

        $collection = Mage::getResourceModel('catalog/product_collection');
        $collection->setVisibility(Mage::getSingleton('catalog/product_visibility')->getVisibleInCatalogIds());


        $collection = $this->_addProductAttributesAndPrices($collection)
            ->addStoreFilter()
            ->addAttributeToFilter('special_from_date', array('or'=> array(
                0 => array('date' => true, 'to' => $todayEndOfDayDate),
                1 => array('is' => new Zend_Db_Expr('null')))
            ), 'left')
            ->addAttributeToFilter('special_to_date', array('or'=> array(
                0 => array('date' => true, 'from' => $todayStartOfDayDate),
                1 => array('is' => new Zend_Db_Expr('null')))
            ), 'left')
            ->addAttributeToFilter(
                array(
                    array('attribute' => 'special_from_date', 'is'=>new Zend_Db_Expr('not null')),
                    array('attribute' => 'special_to_date', 'is'=>new Zend_Db_Expr('not null'))
                    )
              )
            ->addAttributeToSort('special_from_date', 'desc')
            ->setPageSize($this->getProductsCount())
            ->setCurPage(1);


        return $collection;
    }

	public function getSliderOptions () {
        
         if ($this->getData('template') == 'meigee/meigeewidgetsblacknwhite/slider.phtml' and $this->getData('autoSlide') == 1) {
            $options =
            ', autoSlide: 1, '
            . 'autoSlideTimer:'.$this->getData('autoSlideTimer').','
            .'autoSlideTransTimer:'.$this->getData('autoSlideTransTimer');
			return $options;
		}
    }
	public function getWidgetId () {
        return $this->getData("widget_id");
    }

}