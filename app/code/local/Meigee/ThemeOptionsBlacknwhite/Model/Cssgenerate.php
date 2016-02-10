<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meigeeteam.com <nick@meigeeteam.com>
 * @copyright Copyright (C) 2010 - 2014 Meigeeteam
 *
 */
class Meigee_ThemeOptionsBlacknwhite_Model_Cssgenerate extends Mage_Core_Model_Abstract
{
    private $baseColors;
	private $catlabelsColors;
	private $menuColors;
    private $appearance;
    private $mediaPath;
    private $dirPath;
    private $filePath;
	private $headerSliderColors;
	private $buttonsColors;
	private $footerColors;
	private $socialLinksColors;
	private $productsColors;
	private $headerColors;
	private $contentColors;
	private $pageNotFoundColors;
	private $parallaxColors;

    private function setParams () {
        $this->baseColors = Mage::getStoreConfig('meigee_blacknwhite_design/base');
		$this->catlabelsColors = Mage::getStoreConfig('meigee_blacknwhite_design/catlabels');
		$this->menuColors = Mage::getStoreConfig('meigee_blacknwhite_design/menu');
        $this->appearance = Mage::getStoreConfig('meigee_blacknwhite_design/appearance');
		$this->headerSliderColors = Mage::getStoreConfig('meigee_blacknwhite_design/headerslider');
		$this->buttonsColors = Mage::getStoreConfig('meigee_blacknwhite_design/buttons');
		$this->footerColors = Mage::getStoreConfig('meigee_blacknwhite_design/footer');
		$this->socialLinksColors = Mage::getStoreConfig('meigee_blacknwhite_design/social_links');
		$this->productsColors = Mage::getStoreConfig('meigee_blacknwhite_design/products');
		$this->headerColors = Mage::getStoreConfig('meigee_blacknwhite_design/header');
		$this->contentColors = Mage::getStoreConfig('meigee_blacknwhite_design/content');
		$this->pageNotFoundColors = Mage::getStoreConfig('meigee_blacknwhite_design/page_not_found');
		$this->parallaxColors = Mage::getStoreConfig('meigee_blacknwhite_design/parallax');
    }

    private function setLocation () {
        $this->mediaPath = Mage::getBaseDir('media') . 'images/';
        $this->dirPath = Mage::getBaseDir('skin') . '/frontend/blacknwhite/default/css/';
        $this->filePath = $this->dirPath . 'skin.css';
    }

    public function saveCss()
    {

        $this->setParams();

$css = "/**
*
* This file is generated automaticaly. Please do no edit it directly cause all changes will be lost.
*
*/
";

if ($this->appearance['font_main'] == 1)
{
    $css .= '/*====== Font Replacement - Main Text =======*/ ';
    if ($this->appearance['main_default_sizes'] == 0)
        {
$css .= '
body{
    font-family: '. $this->appearance['gfontmain'] .', sans-serif; 
    font-size:'. $this->appearance['main_fontsize'] .'px !important;
    line-height:' . $this->appearance['main_lineheight'] .'px !important;
    font-weight:' .$this->appearance['main_fontweight'] .' !important;
}

';
	}else{
		$css .= '
		body{
			font-family: '. $this->appearance['gfontmain'] .', sans-serif;
		}
		
		';
	}
};


if ($this->appearance['font'] == 1)
{
	$gfont = $this->appearance['gfont'];
	if(stripos($gfont, ' ')){
		$gfont = '"'.$gfont.'"';
	}
    $css .= '/*====== Font Replacement - Titles =======*/ ';
    if ($this->appearance['default_sizes'] == 0)
        {
$css .= '
.products-grid .out-of-stock-label,
.products-list .out-of-stock-label,
.block-layered-nav dl#narrow-by-list2 dt h2,
.ajax-media-button-holder .ajax-media,
aside.sidebar .block.block-cart .product-details .product-name a,
aside.sidebar .block.block-cart .subtotal,
.map-container .map-block,
.widget-latest li h3 a,
.nav-container li.level-top > a span,
header#header .top-cart .block-title .title-cart,
#footer .footer-block-title h2,
#footer .footer-topline .custom-footer-content li > span h3,
#footer .footer-address-block p,
.products-grid .product-name a,
.price,
.btn-quick-view span,
.products-list .product-name a,
.minimal-price-link .label,
.page-title h1,
.page-title h2,
.page-title h3,
.page-title h4,
.page-title h5,
.page-title h6,
.widget-title h1,
.widget-title h2,
.widget .widget-title h1,
.widget .widget-title h2,
aside.sidebar .block.block-layered-nav dl dt h2,
aside.sidebar .block.block-layered-nav dl dd a,
aside.sidebar .block.block-layered-nav dl dd li span,
aside.sidebar .block.block-layered-nav #amount,
aside.sidebar .block.block-layered-nav #amount-2,
aside.sidebar .block-title strong span,
.block-vertical-nav li.level-top a.level-top,
aside.sidebar .product-name a,
.block-poll label,
aside.sidebar .block .block-subtitle,
.sorter .sort-by label,
.toolbar .sbSelector > span,
.label-new,
.label-sale,
.products-grid .availability-only,
.products-list .availability-only,
.pager .pages ol li.current,
.pager .pages ol li a,
.product-view .product-shop .product-name h1,
.meigee-tabs a,
.rating-subtitle h2,
.catalog-product-view .box-reviews ul li h6 a,
.block-related .product-name a,
.block-related .block-title strong span,
.block-related .block-content .block-subtitle a,
.product-collateral h2,
.product-options-title h2,
.price-as-configured .price-label,
header#header .top-cart .product-name a,
.cart .page-title h1,
.data-table .product-name a,
.cart-blocks-title h2,
section .crosssell .product-details .product-name a,
#cart-accordion h3.accordion-title,
#cart-accordion .accordion-content .crosssell li.item .product-name a,
aside.sidebar .block-account li a,
aside.sidebar .block-account li strong,
.dashboard .welcome-msg .hello,
.dashboard .box-title h2,
.dashboard .box-title h3,
.dashboard .box-head h3,
.dashboard .box-head h2,
.fieldset .legend,
.addresses-list .addresses-primary h2,
.addresses-list .addresses-additional h2,
.product-review .product-name,
header#header .top-cart .block-content .subtotal span,
#login-holder .page-title h1,
#login-holder form p,
#login-holder .link-box a,
.onepagecheckout-index-index .main-container .page-title,
#onepagecheckout_orderform .col3-set.onepagecheckout_datafields .op_block_title,
.opc h3,
.opc .step-title h2,
.multiple-checkout h2,
.nav-wide#nav-wide .top-content .top-menu-features li span h3,
.nav-wide#nav-wide ul.level0 li.level1 span.subtitle,
.header-slider-container .iosSlider .slider .item h2,
.header-slider-container .iosSlider .slider .item h3,
.header-slider-container .iosSlider .slider .item .slide-container.slide-skin-2 p,
.header-slider-container .iosSlider .slider .item .slide-container.slide-skin-2 h4,
#login-form h2,
.quick-view-title h2,
.block-subscribe .form-subscribe-header label,
.block-subscribe-popup .indent h3,
aside.sidebar .block.block-layered-nav .currently .label,
.parallax-banners-wrapper .text-banner .banner-content h2,
.parallax-banners-wrapper .text-banner .banner-content h3,
.parallax-banners-wrapper .text-banner .banner-content.skin-3 p,
.parallax-banners-wrapper .text-banner .banner-content.skin-3 h4,
.product-tabs li,
.about-us-wrapper .text h2,
.about-us-wrapper .text h3 {
    font-family: '. $gfont .', sans-serif; 
    font-size:'. $this->appearance['fontsize'] .'px !important;
    line-height:' . $this->appearance['lineheight'] .'px !important;
    font-weight:' .$this->appearance['fontweight'] .' !important;
}';
        } else {
        $css .= '
.products-grid .out-of-stock-label,
.products-list .out-of-stock-label,
.block-layered-nav dl#narrow-by-list2 dt h2,
.ajax-media-button-holder .ajax-media,
aside.sidebar .block.block-cart .product-details .product-name a,
aside.sidebar .block.block-cart .subtotal,
.map-container .map-block,
.widget-latest li h3 a,
.nav-container li.level-top > a span,
header#header .top-cart .block-title .title-cart,
#footer .footer-block-title h2,
#footer .footer-topline .custom-footer-content li > span h3,
#footer .footer-address-block p,
.products-grid .product-name a,
.price,
.btn-quick-view span,
.products-list .product-name a,
.minimal-price-link .label,
.page-title h1,
.page-title h2,
.page-title h3,
.page-title h4,
.page-title h5,
.page-title h6,
.widget-title h1,
.widget-title h2,
.widget .widget-title h1,
.widget .widget-title h2,
aside.sidebar .block.block-layered-nav dl dt h2,
aside.sidebar .block.block-layered-nav dl dd a,
aside.sidebar .block.block-layered-nav dl dd li span,
aside.sidebar .block.block-layered-nav #amount,
aside.sidebar .block.block-layered-nav #amount-2,
aside.sidebar .block-title strong span,
.block-vertical-nav li.level-top a.level-top,
aside.sidebar .product-name a,
.block-poll label,
aside.sidebar .block .block-subtitle,
.sorter .sort-by label,
.toolbar .sbSelector > span,
.label-new,
.label-sale,
.pager .pages ol li.current,
.pager .pages ol li a,
.product-view .product-shop .product-name h1,
.meigee-tabs a,
.rating-subtitle h2,
.catalog-product-view .box-reviews ul li h6 a,
.block-related .product-name a,
.block-related .block-title strong span,
.block-related .block-content .block-subtitle a,
.product-collateral h2,
.product-options-title h2,
.price-as-configured .price-label,
header#header .top-cart .product-name a,
.cart .page-title h1,
.data-table .product-name a,
.cart-blocks-title h2,
section .crosssell .product-details .product-name a,
#cart-accordion h3.accordion-title,
#cart-accordion .accordion-content .crosssell li.item .product-name a,
aside.sidebar .block-account li a,
aside.sidebar .block-account li strong,
.dashboard .welcome-msg .hello,
.dashboard .box-title h2,
.dashboard .box-title h3,
.dashboard .box-head h3,
.dashboard .box-head h2,
.fieldset .legend,
.addresses-list .addresses-primary h2,
.addresses-list .addresses-additional h2,
.product-review .product-name,
header#header .top-cart .block-content .subtotal span,
#login-holder .page-title h1,
#login-holder form p,
#login-holder .link-box a,
.onepagecheckout-index-index .main-container .page-title,
#onepagecheckout_orderform .col3-set.onepagecheckout_datafields .op_block_title,
.opc h3,
.opc .step-title h2,
.multiple-checkout h2,
.nav-wide#nav-wide .top-content .top-menu-features li span h3,
.nav-wide#nav-wide ul.level0 li.level1 span.subtitle,
.header-slider-container .iosSlider .slider .item h2,
.header-slider-container .iosSlider .slider .item h3,
.header-slider-container .iosSlider .slider .item .slide-container.slide-skin-2 p,
.header-slider-container .iosSlider .slider .item .slide-container.slide-skin-2 h4,
#login-form h2,
.quick-view-title h2,
.block-subscribe .form-subscribe-header label,
.block-subscribe-popup .indent h3,
aside.sidebar .block.block-layered-nav .currently .label,
.parallax-banners-wrapper .text-banner .banner-content h2,
.parallax-banners-wrapper .text-banner .banner-content h3,
.parallax-banners-wrapper .text-banner .banner-content.skin-3 p,
.parallax-banners-wrapper .text-banner .banner-content.skin-3 h4,
.product-tabs li,
.about-us-wrapper .text h2,
.about-us-wrapper .text h3 {font-family: ' . $gfont .', sans-serif;}';
    }
}

if (isset($this->appearance['custompatern'])) {
$css .= '

/*====== Custom Patern =======*/
body,
body.boxed-layout{ background: url("' . MAGE::helper('ThemeOptionsBlacknwhite')->getThemeOptionsBlacknwhite('mediaurl') . $this->appearance['custompatern'] . '") center top repeat !important;}';
}
$css .= '

/*====== Site Bg =======*/
body {background-color:#' . $this->baseColors['sitebg'] . ';}

/*====== Skin Color #1 =======*/
aside.sidebar .block.block-cart .product-details .product-box .price,
aside.sidebar .block.block-cart .subtotal .price,
a:hover,
#footer .footer-address-block p a:hover,
#footer address a:hover,
.products-grid .product-name a:hover,
.regular-price .price,
.special-price .price,
.price-from .price,
.price-to .price,
.products-grid .add-to-links li i:hover,
.products-list .product-name a:hover,
.minimal-price-link .price,
.products-list .add-to-links i:hover,
#categories-accordion li.level-top a.level-top:hover,
#categories-accordion li.level-top.parent ul.level0 li a:hover,
#categories-accordion .btn-cat.closed > i,
.block-compare li.item .btn-remove i:hover,
.availability.out-of-stock span,
.availability-only i,
div.quantity-decrease i:hover,
div.quantity-increase i:hover,
.catalog-product-view .box-reviews .form-add h3 span,
.catalog-product-view .box-reviews ul li small span,
.block-related .product-name a:hover,
.block-related .block-content .block-subtitle a:hover,
.product-options-bottom  i:hover,
.price-as-configured .price,
header#header .top-cart .product-name a:hover,
header#header .top-cart .block-content .mini-products-list .product-details .price,
.data-table .product-name a:hover,
.data-table .c_actions a i:hover,
.data-table .cart-price .price,
.data-table .remove i:hover,
.sp-methods .price,
.cart .totals .checkout-types li a:hover,
.dashboard .box-title a i:hover,
.dashboard .box-head a i:hover,
.my-account .addresses-list li.item a:hover,
.my-account .data-table a:hover,
.my-wishlist .data-table .table-buttons a i:hover,
header#header .top-cart .block-content .subtotal .price,
#login-holder form .actions > a:hover,
#login-holder .link-box a:hover,
.opc-wrapper-opc .page-title .text-login a:hover,
.md-modal-footer a:hover,
.multiple-checkout .grand-total .price,
nav.breadcrumbs li a:hover,
nav.breadcrumbs li a:hover + span,
.nav-wide#nav-wide .top-content .top-menu-links li a,
header#header .customer-name .user i,
.tags-list li a:hover,
.header-slider-container .iosSlider .slider .item .slide-container.slide-skin-2 h3 span,
.header-slider-container .iosSlider .slider .item .slide-container.slide-skin-3 h3 span,
.product-view .product-shop .add-to-links-box i:hover,
#cart-accordion .accordion-content .crosssell li.item .product-name a:hover,
.widget-latest li h3 a:hover,
.widget-latest li .comments a:hover{color: #' . $this->baseColors['maincolor'] . ';}

.block-vertical-nav li.active > a,
.block-vertical-nav li.custom-active > a {color: #' . $this->baseColors['maincolor'] . '!important;}

.category-products .toolbar-bottom:before,
#footer .block-tags .actions a:hover,
button.button:hover > span,
ul.social-links li a i:hover,
#footer .block-tags .tags-list li a:hover,
.ui-slider .ui-slider-range,
.block-compare .actions a:hover,
.block-compare .actions button span,
aside.sidebar .block-tags li a:hover,
aside.sidebar .block-tags .actions a:hover,
aside.sidebar .block-reorder .actions a:hover,
.block-reorder .actions button span,
aside.sidebar .block.block-wishlist .actions a:hover,
.sorter .view-mode a:hover i,
.sorter .view-mode strong i,
.sorter a.desc i:hover,
.sorter a.asc i:hover,
div.label-sale,
.products-grid .availability-only,
.products-list .availability-only,
.add-to-cart button.button span,
.catalog-product-view .box-reviews .full-review,
.iwdbutton button.button span,
.cart .btn-proceed-checkout span,
header#header .top-cart .block-content .actions .button span,
.cart-table .buttons-row button.btn-continue:hover span,
.my-wishlist .buttons-set .btn-update:hover span,
header#header .top-cart .block-content .actions a:hover,
#checkout-coupon-discount-load .discount-form .buttons-set button.button:hover span span,
#onepagecheckout_orderform  #checkout-review-submit button span span,
.md-modal-footer button.button:hover span span,
nav.breadcrumbs li span:after,
.header-slider-container .iosSlider .prev:hover i,
.header-slider-container .iosSlider .next:hover i,
.cart-remove-box a:hover,
.add-to-cart-success a:hover,
#login-holder form .actions button:hover span span,
table#wishlist-table td .cart-cell button.button:hover span span,
.block-subscribe-popup .indent button.button:hover span span,
aside.sidebar .block.block-layered-nav .actions a:hover,
a.aw-blog-read-more:hover{background-color: #' . $this->baseColors['maincolor'] . ';}

.label-type-5 div.label-sale:before,
.products-grid.label-type-5 .availability-only:before,
.products-list.label-type-5 .availability-only:before{
	border-top-color: #' . $this->baseColors['maincolor'] . ';
}
.label-type-5 div.label-sale:after,
.products-grid.label-type-5 .availability-only:after,
.products-list.label-type-5 .availability-only:after{
	border-bottom-color: #' . $this->baseColors['maincolor'] . ';
}

#footer .block-tags .actions a:hover,
button.button:hover span,
#footer .block-tags .tags-list li a:hover,
.block-compare .actions a:hover,
.block-compare .actions button span,
aside.sidebar .block-tags li a:hover,
aside.sidebar .block-tags .actions a:hover,
aside.sidebar .block-reorder .actions a:hover,
.block-reorder .actions button span,
aside.sidebar .block.block-wishlist .actions a:hover,
.add-to-cart button.button span,
.iwdbutton button.button span,
.cart .btn-proceed-checkout span,
header#header .top-cart .block-content .actions .button span,
.cart-table .buttons-row button.btn-continue:hover span,
.my-wishlist .buttons-set .btn-update:hover span,
header#header .top-cart .block-content .actions a:hover,
#checkout-coupon-discount-load .discount-form .buttons-set button.button:hover span,
#onepagecheckout_orderform  #checkout-review-submit button > span,
.md-modal-footer button.button:hover > span,
.cart-remove-box a:hover,
.add-to-cart-success a:hover,
#login-holder form .actions button:hover > span,
.block-subscribe-popup .indent button.button:hover > span,
aside.sidebar .block.block-layered-nav .actions a:hover,
a.aw-blog-read-more:hover{border-color: #' . $this->baseColors['maincolor'] . ';}

/*====== Skin Color #2 =======*/
a,
.opc-wrapper-opc .page-title .text-login,
.opc-wrapper-opc .page-title .text-login a,
.nav-wide#nav-wide .top-content .top-menu-links li a:hover,
.header-slider-container .iosSlider .slider .item h3,
.header-slider-container .iosSlider .slider .item .slide-container.slide-skin-2 h4,
.header-slider-container .iosSlider .slider .item .slide-container.slide-skin-3 h4 {color: #' . $this->baseColors['secondcolor'] . ';}

.products-grid .btn-quick-view > span,
.products-list .btn-quick-view > span {
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#CC' . $this->baseColors['secondcolor'] . ',endColorstr=#CC' . $this->baseColors['secondcolor'] . ');
	background-color: rgba('.MAGE::helper('ThemeOptionsBlacknwhite')->HexToRGB($this->baseColors['secondcolor']).', 0.8);
}

.ajax-media-button-holder .ajax-media,
.products-grid .btn-quick-view:hover > span,
.products-list .btn-quick-view:hover > span,
span.label-new {background-color: #' . $this->baseColors['secondcolor'] . ';}

.label-type-5 span.label-new:before{
    border-top-color: #' . $this->baseColors['secondcolor'] . ';
}
.label-type-5 span.label-new:after{
    border-bottom-color: #' . $this->baseColors['secondcolor'] . ';
}

.product-view .product-name div.sku::selection {background-color: #' . $this->baseColors['secondcolor'] . ';}
.product-view .product-name div.sku::-moz-selection {background-color: #' . $this->baseColors['secondcolor'] . ';}

';

$headerBgTransparent = ($this->parallaxColors["transparent_header_bg_value"]/100);
$searchBgTransparent = ($this->parallaxColors["header_search_and_switchers_transparent_bg_value"]/100);
$searchBorderTransparent = ($this->parallaxColors["header_search_and_switchers_transparent_border_value"]/100);
$menuBgTransparent = ($this->parallaxColors["transparent_menu_blockbg_value"]/100);
$menuBorderTransparent = ($this->parallaxColors["menu_block_border_transparent_value"]/100);
$menuLinkBgTransparent = ($this->parallaxColors["transparent_menu_linkbg_value"]/100);
$menuLinkBgHTransparent = ($this->parallaxColors["transparent_menu_linkbg_h_value"]/100);
$menuLinkBgATransparent = ($this->parallaxColors["transparent_menu_linkbg_a_value"]/100);
$wishlistLinkBgTransparent = ($this->parallaxColors["menu_wishlist_link_transparent_bg_value"]/100);
$wishlistLinkBgHTransparent = ($this->parallaxColors["menu_wishlist_link_transparent_bg_h_value"]/100);
$cartLinkBgTransparent = ($this->parallaxColors["menu_cart_link_transparent_bg_value"]/100);
$cartLinkBgHTransparent = ($this->parallaxColors["menu_cart_link_transparent_bg_h_value"]/100);

if ($this->baseColors['base_override'] == 1) {
    $css .= '/*====== Menu Color =======*/
    header#header .topline,
    body.boxed-layout header#header .topline .container_12 {background-color: #' . $this->menuColors['blockbg'] . ';}
    .topline .grid_12 {
    	border-top-color: #' . $this->menuColors['block_border'] . ';
    	border-bottom-color: #' . $this->menuColors['block_border'] . ';
    	border-top-width: ' . $this->menuColors['block_border_width'] . 'px;
    	border-bottom-width: ' . $this->menuColors['block_border_width'] . 'px;
    }
	.nav-container li.level-top.active > a,
    .nav-container li.level-top.custom-active > a,
	.nav-container li.level-top.over > a,
	.nav-container li.level-top > a:hover {
		margin-top: -' . $this->menuColors['block_border_width'] . 'px;
		margin-bottom: -' . $this->menuColors['block_border_width'] . 'px;
		padding-top:  ' . $this->menuColors['block_border_width'] . 'px;
		padding-bottom:  ' . $this->menuColors['block_border_width'] . 'px;
	}
    .nav-container li.level-top > a span,
	.nav-container.mobile li.level-top.over > a span,
	.nav-container.mobile li.level-top.active > a span,
    .nav-container.mobile li.level-top.custom-active > a span{color: #' . $this->menuColors['link_color'] . ';}
    .nav-container li.level-top > a:hover span {color: #' . $this->menuColors['link_color_h'] . ';}
    .nav-container li.level-top > a {background-color: #' . $this->menuColors['linkbg'] . ';}
    .nav-container li.level-top.over > a,
	.nav-container li.level-top > a:hover {background-color: #' . $this->menuColors['linkbg_h'] . ';}
    .nav-container li.level-top.active > a,
    .nav-container li.level-top.custom-active > a {background-color: #' . $this->menuColors['linkbg_a'] . ';}
    .nav-container li.level-top.over > a span,
	.nav-container li.level-top.active > a span,
    .nav-container li.level-top.custom-active > a span {color: #' . $this->menuColors['link_color_a'] . ';}

    /**** Dropdown Menu ****/
    .nav-wide#nav-wide .menu-wrapper,
	.nav-wide#nav-wide .menu-wrapper.default-menu ul{background-color: #' . $this->menuColors['menuwrapper'] . ';}
    .nav-wide#nav-wide .top-content .top-menu-links {border-bottom-color: #' . $this->menuColors['topmenulinks'] . ';}
    .nav-wide#nav-wide .top-content i {color: #' . $this->menuColors['topcontenticons'] . '; border-color: #' . $this->menuColors['topcontenticons'] . ';}
    .nav-wide#nav-wide .top-content h3 {color: #' . $this->menuColors['topcontenttitles'] . ';}
    .nav-wide#nav-wide .top-content {color: #' . $this->menuColors['topmenutext'] . ';}
    .nav-wide#nav-wide ul.level0 li.level1 span.subtitle {background-color: #' . $this->menuColors['subtitlebg'] . '; color: #' . $this->menuColors['subtitle'] . ';}
    .nav-wide#nav-wide ul.level1 a {color: #' . $this->menuColors['linkcolor'] . ';}
    .nav-wide#nav-wide ul.level1 a:hover,
	.nav-wide#nav-wide .menu-wrapper.default-menu ul.level0 li:hover{background-color: #' . $this->menuColors['linkcolorhover'] . ';}
    .nav-wide#nav-wide .bottom-content {background-color: #' . $this->menuColors['boottombg'] . '; color: #' . $this->menuColors['boottomtext'] . ';}

    /**** Cart and Wishlist ****/
    header#header .top-link-wishlist i,
    header#header .top-link-wishlist .wishlist-items {color: #' . $this->menuColors['wishlist_link_color'] . ';}
    header#header .top-link-wishlist:hover i,
    header#header .top-link-wishlist:hover .wishlist-items {color: #' . $this->menuColors['wishlist_link_color_h'] . ';}
    header#header .top-link-wishlist {background-color: #' . $this->menuColors['wishlist_link_bg'] . ';}
    header#header .top-link-wishlist:hover {background-color: #' . $this->menuColors['wishlist_link_bg_h'] . ';}
    header#header .top-cart .block-title {background-color: #' . $this->menuColors['cart_link_bg'] . ';}
    header#header .top-cart .block-title .title-cart {color: #' . $this->menuColors['cart_link_color'] . ';}
	header#header .top-cart .block-title .cart-divider {background-color: #' . $this->menuColors['cart_link_color'] . ';}
    header#header .top-cart .block-title:hover .title-cart,
    header#header .top-cart .block-title.active .title-cart {color: #' . $this->menuColors['cart_link_color_h'] . ';}
	header#header .top-cart .block-title:hover .cart-divider,
	header#header .top-cart .block-title.active .cart-divider {background-color: #' . $this->menuColors['cart_link_color_h'] . ';}
    header#header .top-cart .block-title:hover,
    header#header .top-cart .block-title.active {background-color: #' . $this->menuColors['cart_link_bg_h'] . ';}

    /*====== Category Labels =======*/
    .nav-wide#nav-wide li.level-top .category-label.label_one { 
        background-color: #' . $this->catlabelsColors['label_one'] . ';
        border-color: #' . $this->catlabelsColors['label_one'] . ';
        color: #' . $this->catlabelsColors['label_one_color'] . ';
    }
    .nav-wide#nav-wide li.level-top.over .category-label.label_one { 
        background-color: #' . $this->catlabelsColors['label_one_h'] . ';
        border-color: #' . $this->catlabelsColors['label_one_h'] . ';
        color: #' . $this->catlabelsColors['label_one_color_h'] . ';
    }
    .nav-wide#nav-wide li.level-top .category-label.label_two { 
        background-color: #' . $this->catlabelsColors['label_two'] . ';
        border-color: #' . $this->catlabelsColors['label_two'] . ';
        color: #' . $this->catlabelsColors['label_two_color'] . ';
    }
    .nav-wide#nav-wide li.level-top.over .category-label.label_two { 
        background-color: #' . $this->catlabelsColors['label_two_h'] . ';
        border-color: #' . $this->catlabelsColors['label_two_h'] . ';
        color: #' . $this->catlabelsColors['label_two_color_h'] . ';
    }
    .nav-wide#nav-wide li.level-top .category-label.label_three { 
        background-color: #' . $this->catlabelsColors['label_three'] . ';
        border-color: #' . $this->catlabelsColors['label_three'] . ';
        color: #' . $this->catlabelsColors['label_three_color'] . ';
    }
    .nav-wide#nav-wide li.level-top.over .category-label.label_three { 
        background-color: #' . $this->catlabelsColors['label_three_h'] . ';
        border-color: #' . $this->catlabelsColors['label_three_h'] . ';
        color: #' . $this->catlabelsColors['label_three_color_h'] . ';
    }

    /*====== Header =======*/
    header#header,
    header#header .welcome-msg {color: #' . $this->headerColors['text_color'] . ';}
    header#header a {color: #' . $this->headerColors['link_color'] . ';}
    header#header a:hover {color: #' . $this->headerColors['link_color_h'] . ';}
    header#header,
    body.boxed-layout header#header > .container_12 {background-color: #' . $this->headerColors['header_bg'] . ';}
    header#header .form-search .indent,
    header#header .sbHolder a,
    header#header .sbHolder .sbOptions {
    	background-color: #' . $this->headerColors['search_and_switchers_bg'] . ';
    	border-color: #' . $this->headerColors['search_and_switchers_border'] . ';
    }
    header#header .form-search input {border-color: #' . $this->headerColors['search_textfield_border'] . ';}
    header#header .form-search input,
    header#header a.sbSelector,
    header#header .form-search button span i,
    header#header .sbHolder a {color: #' . $this->headerColors['search_and_switchers_color'] . ';}
    header#header a.sbSelector span {border-top-color: #' . $this->headerColors['search_and_switchers_color'] . ';}

	/**** Login and Register popup ****/
	header#header .links li a.top-link-login {
		background-color: #' . $this->headerColors['login_bg'] . ';
		color: #' . $this->headerColors['login_color'] . ';
	}
	header#header .links li a.top-link-login:hover {
		background-color: #' . $this->headerColors['login_bg_h'] . ';
		color: #' . $this->headerColors['login_color_h'] . ';
	}
	#login-holder {background-color: #' . $this->headerColors['login_form_bg'] . ';}
	#login-holder form p.required {color: #' . $this->headerColors['login_system_text'] . ';}
	#login-holder .page-title h1 {color: #' . $this->headerColors['login_title_color'] . ';}
	#login-holder .page-title .left-divider,
	#login-holder .page-title .right-divider {border-color: #' . $this->headerColors['login_title_dividers_color'] . ';}
	#login-holder form p,
	#login-holder form .fieldset .legend {color: #' . $this->headerColors['login_text_color'] . ';}
	#login-holder form .input-box input {
		background-color: #' . $this->headerColors['login_input_bg'] . ';
		border-color: #' . $this->headerColors['login_input_border'] . ';
		color: #' . $this->headerColors['login_input_color'] . ';
	}
	#login-holder .account-create .form-list label,
	#login-holder form .input-box label em,
	#login-holder form .input-box label {color: #' . $this->headerColors['login_label_color'] . ';}
	#login-holder .link-box {background-color: #' . $this->headerColors['login_register_switcher_bg'] . ';}
	#login-holder .link-box a {color: #' . $this->headerColors['login_register_switcher'] . ';}
	#login-holder .link-box a:hover {color: #' . $this->headerColors['login_register_switcher_h'] . ';}
	#login-holder form .actions {background-color: #' . $this->headerColors['login_register_bottom_bg'] . ';}
	#login-holder .close-button i {color: #' . $this->headerColors['login_icon_color'] . ';}
	#login-holder .close-button i:hover {color: #' . $this->headerColors['login_icon_color_h'] . ';}
	#login-holder form .actions > a {color: #' . $this->headerColors['login_forgot_color'] . ';}
	#login-holder form .actions > a:hover {color: #' . $this->headerColors['login_forgot_color_h'] . ';}
	
    /**** Account ****/
    header#header .customer-name,
    header#header .links li a {
    	color: #' . $this->headerColors['account_link_color'] . ';
    	background-color: #' . $this->headerColors['account_link_bg'] . ';
    }
	header#header .quick-access.simple-list .links li a.top-link-login:hover,
    header#header .customer-name:hover,
    header#header .links li a:hover {
    	color: #' . $this->headerColors['account_link_color_h'] . ';
    	background-color: #' . $this->headerColors['account_link_bg_h'] . '!important;
    }
    header#header .customer-name + .links {background-color: #' . $this->headerColors['account_sub_bg'] . ';}
    header#header .customer-name + .links li a {
    	color: #' . $this->headerColors['account_sub_link_color'] . ';
    	background-color: #' . $this->headerColors['account_sub_link_bg'] . ';
    }
    header#header .customer-name + .links li a:hover {
    	color: #' . $this->headerColors['account_sub_link_color_h'] . ';
    	background-color: #' . $this->headerColors['account_sub_link_bg_h'] . ';
    }

    /*====== Header Slider =======*/
    .header-slider-container .iosSlider .slider .item h2 {color: #' . $this->headerSliderColors['title_one'] . ';}
    .header-slider-container .iosSlider .slider .item h2 span,
    .header-slider-container .iosSlider .slider .item h4,
    .header-slider-container .iosSlider .slider .item h5,
    .header-slider-container .iosSlider .slider .item p,
    .header-slider-container .iosSlider .slider .item .slide-container.slide-skin-2 h2,
    .header-slider-container .iosSlider .slider .item .slide-container.slide-skin-2 p,
    .header-slider-container .iosSlider .slider .item .slide-container.slide-skin-2 h3,
    .header-slider-container .iosSlider .slider .item .slide-container.slide-skin-3 h2,
    .header-slider-container .iosSlider .slider .item .slide-container.slide-skin-3 h3 {color: #' . $this->headerSliderColors['title_two'] . ';}
    .header-slider-container .iosSlider .slider .item h3,
    .header-slider-container .iosSlider .slider .item .slide-container.slide-skin-2 h4,
    .header-slider-container .iosSlider .slider .item .slide-container.slide-skin-3 h4 {color: #' . $this->headerSliderColors['title_three'] . ';}
    .header-slider-container .iosSlider .slider .item .slide-container.slide-skin-2 h3 span,
    .header-slider-container .iosSlider .slider .item .slide-container.slide-skin-3 h3 span {color: #' . $this->headerSliderColors['title_four'] . ';}
    .header-slider-container .iosSlider .prev i,
    .header-slider-container .iosSlider .next i {
    	background-color: #' . $this->headerSliderColors['arrowsbg'] . ';
    	color: #' . $this->headerSliderColors['arrowscolor'] . ';
    }
    .header-slider-container .iosSlider .prev:hover i,
    .header-slider-container .iosSlider .next:hover i {
    	background-color: #' . $this->headerSliderColors['arrowsbg_h'] . ';
    	color: #' . $this->headerSliderColors['arrowscolor_h'] . ';
    }
	
	/*====== Parallax Banners ======*/
	/**** Header ****/
	.parallax-page header#header,
	.parallax-page header#header .welcome-msg {color: #' . $this->parallaxColors['header_text_color'] . ';}
	.parallax-page header#header a {color: #' . $this->parallaxColors['header_link_color'] . ';}
	.parallax-page header#header a:hover {color: #' . $this->parallaxColors['header_link_color_h'] . ';}
	.parallax-page header#header,
	body.boxed-layout .parallax-page  header#header > .container_12,
	.parallax-page header#header .container_12 {
		background-color: ' . ($this->parallaxColors['transparent_header_bg'] == 0 ? ' #' . $this->parallaxColors["header_header_bg"] . ' ' : 'rgba('.MAGE::helper('ThemeOptionsBlacknwhite')->HexToRGB($this->parallaxColors['header_header_bg']).', '.$headerBgTransparent.')').';
	}
	.parallax-page header#header .form-search .indent,
	.parallax-page header#header .sbHolder a {
		background-color: ' . ($this->parallaxColors['header_search_and_switchers_transparent_border'] == 0 ? ' #' . $this->parallaxColors["header_search_and_switchers_bg"] . ' ' : 'rgba('.MAGE::helper('ThemeOptionsBlacknwhite')->HexToRGB($this->parallaxColors['header_search_and_switchers_bg']).', '.$searchBgTransparent.')').';
		border-color: ' . ($this->parallaxColors['transparent_header_bg'] == 0 ? ' #' . $this->parallaxColors["header_search_and_switchers_border"] . ' ' : 'rgba('.MAGE::helper('ThemeOptionsBlacknwhite')->HexToRGB($this->parallaxColors['header_search_and_switchers_border']).', '.$searchBorderTransparent.')').';
	}
	.parallax-page header#header .form-search input {border-color: #' . $this->parallaxColors['header_search_textfield_border'] . ';}
	.parallax-page header#header .form-search input,
	.parallax-page header#header a.sbSelector,
	.parallax-page header#header .form-search button span i {color: #' . $this->parallaxColors['header_search_and_switchers_color'] . ';}
	.parallax-page header#header a.sbSelector span {border-top-color: #' . $this->parallaxColors['header_search_and_switchers_color'] . ';}

	/**** Menu Block ****/
	.parallax-page header#header .topline,
	body.boxed-layout .parallax-page header#header .topline .container_12  {
		background-color: ' . ($this->parallaxColors['transparent_menu_blockbg'] == 0 ? ' #' . $this->parallaxColors["menu_blockbg"] . ' ' : 'rgba('.MAGE::helper('ThemeOptionsBlacknwhite')->HexToRGB($this->parallaxColors['menu_blockbg']).', '.$menuBgTransparent.')').';
	}
	.parallax-page .topline .grid_12 {
		border-top-color: ' . ($this->parallaxColors['menu_block_border_transparent'] == 0 ? ' #' . $this->parallaxColors["menu_block_border"] . ' ' : 'rgba('.MAGE::helper('ThemeOptionsBlacknwhite')->HexToRGB($this->parallaxColors['menu_block_border']).', '.$menuBorderTransparent.')').';
		border-bottom-color: ' . ($this->parallaxColors['menu_block_border_transparent'] == 0 ? ' #' . $this->parallaxColors["menu_block_border"] . ' ' : 'rgba('.MAGE::helper('ThemeOptionsBlacknwhite')->HexToRGB($this->parallaxColors['menu_block_border']).', '.$menuBorderTransparent.')').';
		border-top-width: ' . $this->parallaxColors['menu_block_border_width'] . 'px;
		border-bottom-width: ' . $this->parallaxColors['menu_block_border_width'] . 'px;
	}
	.parallax-page .nav-container li.level-top.active > a,
	.parallax-page .nav-container li.level-top.custom-active > a,
	.parallax-page .nav-container li.level-top.over > a,
	.parallax-page .nav-container li.level-top > a:hover {
		margin-top: -' . $this->parallaxColors['menu_block_border_width'] . 'px;
		margin-bottom: -' . $this->parallaxColors['menu_block_border_width'] . 'px;
		padding-top: ' . $this->parallaxColors['menu_block_border_width'] . 'px;
		padding-bottom: ' . $this->parallaxColors['menu_block_border_width'] . 'px;
	}
	.parallax-page .nav-container li.level-top > a span {color: #' . $this->parallaxColors['menu_link_color'] . ';}
	.parallax-page .nav-container li.level-top > a:hover span {color: #' . $this->parallaxColors['menu_link_color_h'] . ';}
	.parallax-page .nav-container li.level-top > a {
		background-color: ' . ($this->parallaxColors['transparent_menu_linkbg'] == 0 ? ' #' . $this->parallaxColors["menu_linkbg"] . ' ' : 'rgba('.MAGE::helper('ThemeOptionsBlacknwhite')->HexToRGB($this->parallaxColors['menu_linkbg']).', '.$menuLinkBgTransparent.')').';
	}
	.parallax-page .nav-container li.level-top.over > a,
	.parallax-page .nav-container li.level-top > a:hover {
		background-color: ' . ($this->parallaxColors['transparent_menu_linkbg_h'] == 0 ? ' #' . $this->parallaxColors["menu_linkbg_h"] . ' ' : 'rgba('.MAGE::helper('ThemeOptionsBlacknwhite')->HexToRGB($this->parallaxColors['menu_linkbg_h']).', '.$menuLinkBgHTransparent.')').';
	}
	.parallax-page .nav-container li.level-top.active > a,
	.parallax-page .nav-container li.level-top.custom-active > a {
		background-color: ' . ($this->parallaxColors['transparent_menu_linkbg_a'] == 0 ? ' #' . $this->parallaxColors["menu_linkbg_a"] . ' ' : 'rgba('.MAGE::helper('ThemeOptionsBlacknwhite')->HexToRGB($this->parallaxColors['menu_linkbg_a']).', '.$menuLinkBgATransparent.')').';
	}
	.parallax-page .nav-container li.level-top.over > a span,
	.parallax-page .nav-container li.level-top.active > a span,
	.parallax-page .nav-container li.level-top.custom-active > a span{color: #' . $this->parallaxColors['menu_link_color_a'] . ';}

	.parallax-page header#header .top-link-wishlist i,
	.parallax-page header#header .top-link-wishlist .wishlist-items {color: #' . $this->parallaxColors['menu_wishlist_link_color'] . ';}
	.parallax-page header#header .top-link-wishlist:hover i,
	.parallax-page header#header .top-link-wishlist:hover .wishlist-items {color: #' . $this->parallaxColors['menu_wishlist_link_color_h'] . ';}
	.parallax-page header#header .top-link-wishlist {
		background-color: ' . ($this->parallaxColors['menu_wishlist_link_transparent_bg'] == 0 ? ' #' . $this->parallaxColors["menu_wishlist_link_bg"] . ' ' : 'rgba('.MAGE::helper('ThemeOptionsBlacknwhite')->HexToRGB($this->parallaxColors['menu_wishlist_link_bg']).', '.$wishlistLinkBgTransparent.')').';
	}
	.parallax-page header#header .top-link-wishlist:hover {
		background-color: ' . ($this->parallaxColors['menu_wishlist_link_transparent_bg_h'] == 0 ? ' #' . $this->parallaxColors["menu_wishlist_link_bg_h"] . ' ' : 'rgba('.MAGE::helper('ThemeOptionsBlacknwhite')->HexToRGB($this->parallaxColors['menu_wishlist_link_bg_h']).', '.$wishlistLinkBgHTransparent.')').';
	}
	.parallax-page header#header .top-cart .block-title {
		background-color: ' . ($this->parallaxColors['menu_cart_link_transparent_bg'] == 0 ? ' #' . $this->parallaxColors["menu_cart_link_bg"] . ' ' : 'rgba('.MAGE::helper('ThemeOptionsBlacknwhite')->HexToRGB($this->parallaxColors['menu_cart_link_bg']).', '.$cartLinkBgTransparent.')').';
	}
	.parallax-page header#header .top-cart .block-title .title-cart {color: #' . $this->parallaxColors['menu_cart_link_color'] . ';}
	.parallax-page header#header .top-cart .block-title .cart-divider {background-color: #' . $this->parallaxColors['menu_cart_link_color'] . ';}
	.parallax-page header#header .top-cart .block-title:hover .title-cart,
	.parallax-page header#header .top-cart .block-title.active .title-cart {color: #' . $this->parallaxColors['menu_cart_link_color_h'] . ';}
	.parallax-page header#header .top-cart .block-title:hover .cart-divider,
	.parallax-page header#header .top-cart .block-title.active .cart-divider {background-color: #' . $this->parallaxColors['menu_cart_link_color_h'] . ';}
	.parallax-page header#header .top-cart .block-title:hover,
	.parallax-page header#header .top-cart .block-title.active {
		background-color: ' . ($this->parallaxColors['menu_cart_link_transparent_bg_h'] == 0 ? ' #' . $this->parallaxColors["menu_cart_link_bg_h"] . ' ' : 'rgba('.MAGE::helper('ThemeOptionsBlacknwhite')->HexToRGB($this->parallaxColors['menu_cart_link_bg_h']).', '.$cartLinkBgHTransparent.')').';
	}
	
	/**** Colors 1 ****/
	.parallax-banners-wrapper .text-banner .banner-content.colors-1 h2 {color: #' . $this->parallaxColors['type1_h2_color'] . ';}
	.parallax-banners-wrapper .text-banner .banner-content.colors-1 h2 span {color: #' . $this->parallaxColors['type1_h2_span_color'] . ';}
	.parallax-banners-wrapper .text-banner .banner-content.colors-1 h3 {color: #' . $this->parallaxColors['type1_h3_color'] . ';}
	.parallax-banners-wrapper .text-banner .banner-content.colors-1 h3 span {color: #' . $this->parallaxColors['type1_h3_span_color'] . ';}
	.parallax-banners-wrapper .text-banner .banner-content.colors-1 h4 {color: #' . $this->parallaxColors['type1_h4_color'] . ';}
	.parallax-banners-wrapper .text-banner .banner-content.colors-1 h5 {color: #' . $this->parallaxColors['type1_h5_color'] . ';}
	.parallax-banners-wrapper .text-banner .banner-content.colors-1 p {color: #' . $this->parallaxColors['type1_p_color'] . ';}

	/**** Colors 2 ****/
	.parallax-banners-wrapper .text-banner .banner-content.colors-2 h2 {color: #' . $this->parallaxColors['type2_h2_color'] . ';}
	.parallax-banners-wrapper .text-banner .banner-content.colors-2 h2 span {color: #' . $this->parallaxColors['type2_h2_span_color'] . ';}
	.parallax-banners-wrapper .text-banner .banner-content.colors-2 h3 {color: #' . $this->parallaxColors['type2_h3_color'] . ';}
	.parallax-banners-wrapper .text-banner .banner-content.colors-2 h3 span {color: #' . $this->parallaxColors['type2_h3_span_color'] . ';}
	.parallax-banners-wrapper .text-banner .banner-content.colors-2 h4 {color: #' . $this->parallaxColors['type2_h4_color'] . ';}
	.parallax-banners-wrapper .text-banner .banner-content.colors-2 h5 {color: #' . $this->parallaxColors['type2_h5_color'] . ';}
	.parallax-banners-wrapper .text-banner .banner-content.colors-2 p {color: #' . $this->parallaxColors['type2_p_color'] . ';}

	/**** Colors 3 ****/
	.parallax-banners-wrapper .text-banner .banner-content.colors-3 h2 {color: #' . $this->parallaxColors['type3_h2_color'] . ';}
	.parallax-banners-wrapper .text-banner .banner-content.colors-3 h2 span {color: #' . $this->parallaxColors['type3_h2_span_color'] . ';}
	.parallax-banners-wrapper .text-banner .banner-content.colors-3 h3 {color: #' . $this->parallaxColors['type3_h3_color'] . ';}
	.parallax-banners-wrapper .text-banner .banner-content.colors-3 h3 span {color: #' . $this->parallaxColors['type3_h3_span_color'] . ';}
	.parallax-banners-wrapper .text-banner .banner-content.colors-3 h4 {color: #' . $this->parallaxColors['type3_h4_color'] . ';}
	.parallax-banners-wrapper .text-banner .banner-content.colors-3 h5 {color: #' . $this->parallaxColors['type3_h5_color'] . ';}
	.parallax-banners-wrapper .text-banner .banner-content.colors-3 p {color: #' . $this->parallaxColors['type3_p_color'] . ';}

	/**** Colors 4 ****/
	.parallax-banners-wrapper .text-banner .banner-content.colors-4 h2 {color: #' . $this->parallaxColors['type4_h2_color'] . ';}
	.parallax-banners-wrapper .text-banner .banner-content.colors-4 h2 span {color: #' . $this->parallaxColors['type4_h2_span_color'] . ';}
	.parallax-banners-wrapper .text-banner .banner-content.colors-4 h3 {color: #' . $this->parallaxColors['type4_h3_color'] . ';}
	.parallax-banners-wrapper .text-banner .banner-content.colors-4 h3 span {color: #' . $this->parallaxColors['type4_h3_span_color'] . ';}
	.parallax-banners-wrapper .text-banner .banner-content.colors-4 h4 {color: #' . $this->parallaxColors['type4_h4_color'] . ';}
	.parallax-banners-wrapper .text-banner .banner-content.colors-4 h5 {color: #' . $this->parallaxColors['type4_h5_color'] . ';}
	.parallax-banners-wrapper .text-banner .banner-content.colors-4 p {color: #' . $this->parallaxColors['type4_p_color'] . ';}
	
	/*====== Content ======*/

	.page-title h1,
	.page-title h2,
	.page-title h3, 
	.page-title h4,
	.page-title h5, 
	.page-title h6,
	.catalogsearch-advanced-result .page-title h1,
	.catalogsearch-result-index .page-title h1,
	.category-title h1 {color: #' . $this->contentColors['page_title_color'] . ';}
	.page-title,
	.catalogsearch-advanced-result .page-title,
	.catalogsearch-result-index .page-title,
	.category-title {
		border-bottom-color: #' . $this->contentColors['page_title_border'] . ';
		border-bottom-width: ' . $this->contentColors['page_title_border_width'] . 'px;
	}

	/**** Toolbar ****/
	.sorter .sort-by label {color: #' . $this->contentColors['toolbar_label'] . ';}
	.toolbar .sbSelector {
		background-color: #' . $this->contentColors['toolbar_select_bg'] . ';
		border-color: #' . $this->contentColors['toolbar_select_border'] . ';
	}
	.toolbar .sbSelector > span.text {color: #' . $this->contentColors['toolbar_select_text'] . ';}
	.toolbar .sbSelector span.text + span {border-top-color: #' . $this->contentColors['toolbar_select_triangle'] . ';}
	.toolbar .sbSelector:hover,
	.toolbar .sbHolder .sbToggleOpen + .sbSelector,
	.toolbar .sbOptions {
		background-color: #' . $this->contentColors['toolbar_select_bg_h'] . ';
		border-color: #' . $this->contentColors['toolbar_select_border_h'] . ';
	}
	.toolbar .sbSelector:hover > span.text,
	.toolbar .sbHolder .sbToggleOpen + .sbSelector > span.text {color: #' . $this->contentColors['toolbar_select_text_h'] . ';}
	.toolbar .sbSelector:hover > span.text + span,
	.toolbar .sbHolder .sbToggleOpen + .sbSelector > span.text + span {border-top-color: #' . $this->contentColors['toolbar_select_triangle_h'] . ';}
	.toolbar .sbOptions li {background-color: #' . $this->contentColors['toolbar_dropdown_link_bg'] . ';}
	.toolbar .sbOptions li a {color: #' . $this->contentColors['toolbar_dropdown_link'] . ';}
	.toolbar .sbOptions li:hover {background-color: #' . $this->contentColors['toolbar_dropdown_link_bg_h'] . ';}
	.toolbar .sbOptions li:hover a {color: #' . $this->contentColors['toolbar_dropdown_link_h'] . ';}
	.toolbar .view-mode a {background-color: #' . $this->contentColors['grid_list_switcher_bg'] . ';}
	.sorter .view-mode a i {color: #' . $this->contentColors['grid_list_switcher_color'] . ';}
	.sorter .view-mode a:hover i {
		background-color: #' . $this->contentColors['grid_list_switcher_bg_h'] . ';
		color: #' . $this->contentColors['grid_list_switcher_color_h'] . ';
	}
	.sorter .view-mode strong i {
		background-color: #' . $this->contentColors['grid_list_switcher_bg_a'] . ';
		color: #' . $this->contentColors['grid_list_switcher_color_a'] . ';
	}
	.sorter a.asc i,
	.sorter a.desc i {
		background-color: #' . $this->contentColors['desc_asc_button_bg'] . ';
		color: #' . $this->contentColors['desc_asc_button_icon'] . ';
	}
	.sorter a.asc i:hover,
	.sorter a.desc i:hover {
		background-color: #' . $this->contentColors['desc_asc_button_bg_h'] . ';
		color: #' . $this->contentColors['desc_asc_button_icon_h'] . ';
	}
	.toolbar .sidebar-button {
		background-color: #' . $this->contentColors['sidebar_hiding_button_bg'] . ';
		border-color: #' . $this->contentColors['sidebar_hiding_button_border'] . ';
		color: #' . $this->contentColors['sidebar_hiding_button_icon'] . ';
	}
	.toolbar .sidebar-button:hover {
		background-color: #' . $this->contentColors['sidebar_hiding_button_bg_h'] . ';
		border-color: #' . $this->contentColors['sidebar_hiding_button_border_h'] . ';
		color: #' . $this->contentColors['sidebar_hiding_button_icon_h'] . ';
	}
	
	/**** Pager ****/
	.pages li {border-color: #' . $this->contentColors['pager_divider'] . ';}
	.pages li a,
	.pager .pages li a.i-previous,
	.pager .pages li a.i-next {
		background-color: #' . $this->contentColors['pager_buttons_bg'] . ';
		border-color: #' . $this->contentColors['pager_buttons_border'] . '; 
		color: #' . $this->contentColors['pager_buttons_color'] . ';
	}
	.pages li:hover a,
	.pager .pages li:hover a.i-previous,
	.pager .pages li:hover a.i-next {
		background-color: #' . $this->contentColors['pager_buttons_bg_h'] . ';
		border-color: #' . $this->contentColors['pager_buttons_border_h'] . ';
		color: #' . $this->contentColors['pager_buttons_color_h'] . ';
	}
	.pages li.current span {
		background-color: #' . $this->contentColors['pager_active_button_bg'] . ';
		border-color: #' . $this->contentColors['pager_active_button_border'] . ';
		color: #' . $this->contentColors['pager_active_button'] . ';
	}
	
	/**** Success Pop Up ****/
	.add-to-cart-success{
		background-color:#' . $this->contentColors['popup_bg'] . ';
		color:#' . $this->contentColors['popup_text'] . ';
	}
	.add-to-cart-success .btn-remove i{color:#' . $this->contentColors['popup_close'] . ';}
	.add-to-cart-success .btn-remove i:hover{color:#' . $this->contentColors['popup_close_h'] . ';}

	/*====== 404 Page =======*/
	.cms-no-route header#header #search_mini_form {
		background: rgba('.MAGE::helper('ThemeOptionsBlacknwhite')->HexToRGB($this->pageNotFoundColors['search_bg']).',.2);
	}
	.cms-no-route header#header .form-search button span i {color: #' . $this->pageNotFoundColors['search_icon'] . ';}
	.cms-no-route header#header .form-search input {
		border-color: rgba('.MAGE::helper('ThemeOptionsBlacknwhite')->HexToRGB($this->pageNotFoundColors['search_border']).',.5);
		color: #' . $this->pageNotFoundColors['search_color'] . ';
	}
	.cms-no-route .page-not-found h2 {color: #' . $this->pageNotFoundColors['title_color'] . ';}
	.cms-no-route .page-not-found h3 {color: #' . $this->pageNotFoundColors['subtitle_color'] . ';}
	.cms-no-route .page-not-found p {color: #' . $this->pageNotFoundColors['text_color'] . ';}
	.cms-no-route .page-not-found .button span {border-color: #' . $this->pageNotFoundColors['search_icon'] . '; border-width: ' . $this->pageNotFoundColors['button_border'] . 'px;}
	.cms-no-route .page-not-found .button span span {color: #' . $this->pageNotFoundColors['button_text'] . ';}
	.cms-no-route .page-not-found .button:hover span {border-color: #' . $this->pageNotFoundColors['button_border_h'] . '; background-color: #' . $this->pageNotFoundColors['button_bg_h'] . ';}
	.cms-no-route .page-not-found .button:hover span span {color: #' . $this->pageNotFoundColors['button_text_h'] . ';}
	.cms-no-route #footer .footer-second-line .footer-links li a,
	.cms-no-route #footer .footer-second-line .footer-links li:before {color: #' . $this->pageNotFoundColors['footer_links'] . ';}
	.cms-no-route #footer .footer-second-line .footer-links li a:hover,
	.cms-no-route #footer .footer-second-line .footer-links li:hover:before {color: #' . $this->pageNotFoundColors['footer_links_h'] . ';}
	.cms-no-route #footer address {color: #' . $this->pageNotFoundColors['copyright_color'] . ';}
	.cms-no-route #footer address a {color: #' . $this->pageNotFoundColors['copyright_link'] . ';}
	.cms-no-route #footer address a:hover {color: #' . $this->pageNotFoundColors['copyright_link_h'] . ';}
	
    /*====== Buttons =======*/
    header#header .top-cart .block-content .actions .button span,
    button.button:hover span,
	.block-compare .actions a:hover,
     aside.sidebar .block-reorder .actions a:hover,
    .block-compare .actions button span,
    .block-reorder .actions button span,
    aside.sidebar .block.block-wishlist .actions a:hover,
    .add-to-cart button.button span,
    aside.sidebar .block-tags .actions a:hover,
    .cart-remove-box a:hover,
    .add-to-cart-success a:hover,
    header#header .top-cart .block-content .actions a:hover,
	a.aw-blog-read-more:hover {border-color: #' . $this->buttonsColors['buttons_border_h'] . ';}
    header#header .top-cart .block-content .actions .button span,
    button.button:hover > span,
	.block-compare .actions a:hover,
    aside.sidebar .block-reorder .actions a:hover,
    .block-compare .actions button span,
    .block-reorder .actions button span,
    .add-to-cart button.button span,
    aside.sidebar .block.block-wishlist .actions a:hover,
    aside.sidebar .block-tags .actions a:hover,
    .cart-remove-box a:hover,
    .add-to-cart-success a:hover,
    header#header .top-cart .block-content .actions a:hover,
	a.aw-blog-read-more:hover {background-color: #' . $this->buttonsColors['buttonsbg_h'] . ';}
    header#header .top-cart .block-content .actions .button span span,
    button.button:hover span span,
	.block-compare .actions button span,
    .block-reorder .actions button span,
    aside.sidebar .block-reorder .actions a:hover,
    .add-to-cart button.button span,
    aside.sidebar .block.block-wishlist .actions a:hover,
    aside.sidebar .actions a:hover,
    .cart-remove-box a:hover,
    .add-to-cart-success a:hover,
    header#header .top-cart .block-content .actions a:hover {color: #' . $this->buttonsColors['buttons_link_h'] . ';}
    button.button span,
    header#header .top-cart .block-content .actions a,
    aside.sidebar .actions a,
    .block-reorder .actions button:hover  span span,
    .block-compare .actions button:hover span span,
    .add-to-cart button.button:hover span span,
    .cart-remove-box a,
    .add-to-cart-success a,
    header#header .top-cart .block-content .actions .button:hover > span span {background-color: #' . $this->buttonsColors['buttonsbg'] . ';}
    button.button span,
    header#header .top-cart .block-content .actions a,
    aside.sidebar .actions a,
    .block-reorder .actions button:hover > span,
    .block-compare .actions button:hover > span,
    .add-to-cart button.button:hover > span,
    .cart-remove-box a,
    .add-to-cart-success a,
    header#header .top-cart .block-content .actions .button:hover > span {border-color: #' . $this->buttonsColors['buttons_border'] . ';}
    button.button span span,
    header#header .top-cart .block-content .actions a,
    aside.sidebar .actions a,
    .block-reorder .actions button:hover span span,
    .block-compare .actions button:hover span span,
    .add-to-cart button.button:hover span span,
    .cart-remove-box a,
    .add-to-cart-success a,
    header#header .top-cart .block-content .actions .button:hover span span {color: #' . $this->buttonsColors['buttons_link'] . ';}

    button.button span,
    header#header .top-cart .block-content .actions a,
    aside.sidebar .actions a,
    .block-reorder .actions button > span,
    .block-compare .actions button > span,
    .add-to-cart button.button > span,
    .cart-remove-box a,
    .add-to-cart-success a,
    .cart .btn-proceed-checkout span {border-width: ' . $this->buttonsColors['buttons_border_width'] . 'px;}

    /**** Buttons Type 2 ****/
    .opc-wrapper-opc .discount-block .button span span,
	.opc-wrapper-opc button.btn-checkout:hover span span,
	#login-holder form .actions button span span,
	.cart-table .buttons-row button.btn-continue span,
	.my-wishlist .buttons-set .btn-update span,
	.cart .btn-proceed-checkout:hover span {
    	background-color: #' . $this->buttonsColors['buttons_2_bg'] . ';
    	color: #' . $this->buttonsColors['buttons_2_link'] . ';
    	border-color: #' . $this->buttonsColors['buttons_2_border'] . ';
    }
    .cart .btn-proceed-checkout:hover span span{
    	color: #' . $this->buttonsColors['buttons_2_link'] . ';
    	background-color: #' . $this->buttonsColors['buttons_2_bg'] . ';
    }
    .opc-wrapper-opc button.btn-checkout:hover > span,
	.opc-wrapper-opc .discount-block .button span,
	#login-holder form .actions button > span{border-color: #' . $this->buttonsColors['buttons_2_border'] . ';}
    .opc-wrapper-opc .discount-block .button:hover span span,
	.opc-wrapper-opc button.btn-checkout span span,
	#login-holder form .actions button:hover span span,
	.cart-table .buttons-row button.btn-continue:hover span,
	.my-wishlist .buttons-set .btn-update:hover span,
	.cart .btn-proceed-checkout span {
    	background-color: #' . $this->buttonsColors['buttons_2_bg_h'] . ';
    	color: #' . $this->buttonsColors['buttons_2_link_h'] . ';
    	border-color: #' . $this->buttonsColors['buttons_2_border_h'] . ';
    }
    .cart .btn-proceed-checkout span span{
    	color: #' . $this->buttonsColors['buttons_2_link_h'] . ';
    	background-color: #' . $this->buttonsColors['buttons_2_bg_h'] . ';
    }
    .opc-wrapper-opc button.btn-checkout > span,
	.opc-wrapper-opc .discount-block .button:hover span,
	#login-holder form .actions button:hover > span {border-color: #' . $this->buttonsColors['buttons_2_border_h'] . ';}

	.opc-wrapper-opc .discount-block .button span span,
	.opc-wrapper-opc button.btn-checkout span span,
	.cart-table .buttons-row button.btn-continue span,
	.my-wishlist .buttons-set .btn-update span,
	#login-holder form .actions button > span,
	.cart .btn-proceed-checkout span {border-width: ' . $this->buttonsColors['buttons_2_border_width'] . 'px;}

    /**** Quick View Button ****/
    .products-grid button.button.btn-quick-view > span,
    .products-list button.button.btn-quick-view > span {
    	background-color: rgba('.MAGE::helper('ThemeOptionsBlacknwhite')->HexToRGB($this->buttonsColors['quick_view_button_bg']).', 0.8);
    	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#CC' . $this->buttonsColors['quick_view_button_bg'] . ',endColorstr=#CC' . $this->buttonsColors['quick_view_button_bg'] . ');
    }
    .products-grid button.button.btn-quick-view span span,
    .products-list button.button.btn-quick-view span span {color: #' . $this->buttonsColors['quick_view_button_link'] . ';}
    .products-grid button.button.btn-quick-view:hover > span,
    .products-list button.button.btn-quick-view:hover > span {background-color: #' . $this->buttonsColors['quick_view_button_bg_h'] . ';}
    .products-grid button.button.btn-quick-view:hover span span,
    .products-list button.button.btn-quick-view:hover span span {color: #' . $this->buttonsColors['quick_view_button_link_h'] . ';}
	
	/**** More Views Button ****/
	header#header .ajax-media-button-holder .ajax-media,
	.ajax-media-button-holder .ajax-media{
		background-color: #' . $this->buttonsColors['more_views_button_bg'] . ';
		color: #' . $this->buttonsColors['more_views_button_link'] . ';
	}
	.ajax-media-button-holder .ajax-media span{background-color: transparent;}
	header#header .ajax-media-button-holder .ajax-media:hover,
	.ajax-media-button-holder .ajax-media:hover{
		background-color: #' . $this->buttonsColors['more_views_button_bg_h'] . ';
		color:#' . $this->buttonsColors['more_views_button_link_h'] . ';
	}
	
    /*====== Products ======*/
    .products-list li.item .product-img-box,
    .products-grid li.item .product-img-box {
    	background-color: #' . $this->productsColors['products_bg'] . ';
    	border-width: ' . $this->productsColors['products_border_width'] . 'px;
    	border-color: #' . $this->productsColors['products_border'] . ';
    }
    .products-grid .product-name a,
    .products-list .product-name a {color: #' . $this->productsColors['products_title_color'] . ';}
    .products-grid .product-name a:hover,
    .products-list .product-name a:hover {color: #' . $this->productsColors['products_title_color_h'] . ';}
    .products-list .desc,
    .products-grid .desc {color: #' . $this->productsColors['produst_text_color'] . ';}
    .products-list .desc a,
    .products-grid .desc a {color: #' . $this->productsColors['products_links_color'] . ';}
    .products-list .desc a:hover,
    .products-grid .desc a:hover {color: #' . $this->productsColors['products_links_color_h'] . ';}
    .price-box .price {color: #' . $this->productsColors['produst_price_color'] . ';}
    .old-price .price {color: #' . $this->productsColors['produst_old_price_color'] . ';}
    .special-price .price {color: #' . $this->productsColors['produst_special_price_color'] . ';}
    .products-grid .price-box {
    	border-color: #' . $this->productsColors['products_divider_color'] . ';
    	border-width: ' . $this->productsColors['products_divider_width'] . 'px;
    }

    /**** Product Labels ****/
    span.label-new {
    	background-color: #' . $this->productsColors['label_new_bg'] . ';
    	color: #' . $this->productsColors['label_new_color'] . ';
    }
	.label-type-5 span.label-new:before{
		border-top-color: #' . $this->productsColors['label_new_bg'] . ';
	}
	.label-type-5 span.label-new:after{
		border-bottom-color: #' . $this->productsColors['label_new_bg'] . ';
	}
	
    div.label-sale,
	.products-grid .availability-only,
	.products-list .availability-only {
    	color: #' . $this->productsColors['label_sale_color'] . ';
    	background-color: #' . $this->productsColors['label_sale_bg'] . ';
    }
	.label-type-5 div.label-sale:before,
	.products-grid.label-type-5 .availability-only:before,
	.products-list.label-type-5 .availability-only:before{
		border-top-color: #' . $this->productsColors['label_sale_bg'] . ';
	}
	.label-type-5 div.label-sale:after,
	.products-grid.label-type-5 .availability-only:after,
	.products-list.label-type-5 .availability-only:after{
		border-bottom-color: #' . $this->productsColors['label_sale_bg'] . ';
	}

    /*====== Social Links =======*/
    ul.social-links li a i {
    	background-color: #' . $this->socialLinksColors['social_links_bg'] . ';
    	color: #' . $this->socialLinksColors['social_links_color'] . ';
    	border-color: #' . $this->socialLinksColors['social_links_border'] . ';
    	border-width: '. $this->socialLinksColors['social_links_border_width'] .'px;
    }
    ul.social-links li a i:hover {
    	color: #' . $this->socialLinksColors['social_links_color_h'] . ';
    	background-color: #' . $this->socialLinksColors['social_links_bg_h'] . ';
    	border-color: #' . $this->socialLinksColors['social_links_border_h'] . ';
    }

    /*====== Footer =======*/
    /**** Top Block ****/
	#footer .footer-topline,
	body.boxed-layout #footer .footer-topline .container_12 {background-color: #' . $this->footerColors['footer_top_bg'] . ';}
	#footer .footer-topline .footer-block-title h2 {color: #' . $this->footerColors['footer_top_title_color'] . ';}
	#footer .footer-topline .footer-block-title .right-divider {
		border-color: #' . $this->footerColors['footer_top_title_border'] . ';
		border-width: ' . $this->footerColors['footer_top_title_border_width'] . 'px;
	}
	#footer .footer-topline p,
	#footer .footer-topline .footer-links li:before,
	#footer .footer-topline .custom-footer-content.features li > span p {color: #' . $this->footerColors['footer_top_text'] . ';}
	#footer .footer-topline .custom-footer-content.features li > span h3 {color: #' . $this->footerColors['footer_top_subtitle_color'] . ';}
	#footer .footer-topline .footer-links ul li a,
	#footer ul.links li a {color: #' . $this->footerColors['footer_top_link'] . ';}
	#footer ul.links li a:hover {color: #' . $this->footerColors['footer_top_link_h'] . ';}
	#footer .footer-topline .footer-links li a:hover,
	#footer ul.links li:after {background-color: #' . $this->footerColors['footer_top_link_bg_h'] . ';}
	#footer ul.links li:before {background-color: #' . $this->footerColors['footer_top_link_bg'] . ';}
	#footer .footer-topline .custom-footer-content.features i {
    	background-color: #' . $this->footerColors['footer_top_icon_bg'] . ';
    	color: #' . $this->footerColors['footer_top_icon_color'] . ';
    	border-color: #' . $this->footerColors['footer_top_icon_border'] . ';
    }
    #footer .footer-topline .custom-footer-content.features i:hover {
    	background-color: #' . $this->footerColors['footer_top_icon_bg_h'] . ';
    	color: #' . $this->footerColors['footer_top_icon_color_h'] . ';
    }

    /**** Medium Block ****/
	#footer .footer-second-line,
	body.boxed-layout #footer .footer-second-line > .container_12 {background-color: #' . $this->footerColors['footer_medium_bg'] . ';}
	#footer .footer-second-line .footer-block-title h2 {color: #' . $this->footerColors['footer_medium_title_color'] . ';}
	#footer .footer-second-line .footer-block-title .right-divider {
		border-color: #' . $this->footerColors['footer_medium_title_border'] . ';
		border-width: ' . $this->footerColors['footer_medium_title_border_width'] . 'px;
	}
	#footer .footer-second-line .contacts-footer-content label,
	#footer .footer-second-line .footer-address-block p,
	#footer .footer-second-line .custom-footer-content.features li > span h3,
	#footer .footer-second-line p,
	#footer .footer-second-line .footer-address-block p a,
	#footer .footer-second-line p a {color: #' . $this->footerColors['footer_medium_text'] . ';}
	#footer .footer-second-line ul.links li a,
	#footer .footer-second-line .custom-footer-content.features li > span p,
	#footer .footer-second-line .footer-links li a,
	#footer .footer-second-line .footer-links li:before {color: #' . $this->footerColors['footer_medium_link'] . ';}
	#footer .footer-second-line ul.links li a:hover,
	#footer .footer-second-line .footer-links li a:hover,
	#footer .footer-second-line .footer-links li:hover:before {color: #' . $this->footerColors['footer_medium_link_h'] . ';}
	#footer .footer-second-line ul.links li:before,
	#footer .footer-second-line .footer-links li a {background-color: #' . $this->footerColors['footer_medium_link_bg'] . ';}
	#footer .footer-second-line ul.links li:after,
	#footer .footer-second-line .footer-links li a:hover {background-color: #' . $this->footerColors['footer_medium_link_bg_h'] . ';}

    /**** Bottom Block ****/
	#footer .footer-bottom-wrapper,
	#footer .footer-bottom-wrapper .container_12 {background-color: #' . $this->footerColors['footer_bottom_bg'] . ';}
	#footer .footer-bottom-wrapper .custom-footer-content.features li > span h3,
	#footer .footer-bottom-wrapper .custom-footer-content.features li > span p,
	#footer .footer-bottom-wrapper,
	#footer .footer-bottom-wrapper .contacts-footer-content label,
	#footer .footer-bottom-wrapper address{color: #' . $this->footerColors['footer_bottom_text'] . ';}
	#footer .footer-bottom-wrapper li a,
	#footer .footer-bottom-wrapper li a:hover,
	#footer .footer-bottom-wrapper ul.links li a,
	#footer .footer-bottom-wrapper ul.links li a:hover,
	#footer .footer-bottom-wrapper a {color: #' . $this->footerColors['footer_bottom_link'] . ';}
	#footer .footer-bottom-wrapper .footer-block-title .right-divider{border-bottom-color: #aaa;}
	#footer .footer-bottom-wrapper .sbSelector:hover > span {border-top-color: #' . $this->footerColors['footer_bottom_link'] . ';}
    #footer address a:hover,
    #footer .footer-bottom-wrapper a:hover {color: #' . $this->footerColors['footer_bottom_link_h'] . ';}
    #footer .footer-bottom-wrapper .sbSelector:hover > span {border-top-color: #' . $this->footerColors['footer_bottom_link_h'] . ';}


    ';
}

    	$this->saveData($css);
        Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('ThemeOptionsBlacknwhite')->__("CSS file with custom styles has been created"));
        return true;
    }

    private function saveData($data)
    {
        $this->setLocation ();

        try {
	        /*$fh = fopen($file, 'w');
	       	fwrite($fh, $data);
	        fclose($fh);*/

            $fh = new Varien_Io_File(); 
            $fh->setAllowCreateFolders(true); 
            $fh->open(array('path' => $this->dirPath));
            $fh->streamOpen($this->filePath, 'w+'); 
            $fh->streamLock(true); 
            $fh->streamWrite($data); 
            $fh->streamUnlock(); 
            $fh->streamClose(); 
    	}
    	catch (Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('ThemeOptionsBlacknwhite')->__('Failed creation custom css rules. '.$e->getMessage()));
        }
    }

}