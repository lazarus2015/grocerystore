Event.observe(window, 'load', function() {
	function jsColor(mainId, exceptions){
		if($$(mainId).length){
			var selection = 'input.input-text:not('+ exceptions +')';
			var selected_items = $$(mainId)[0].select(selection);
			selected_items.each(function(val){
				new jscolor.color(val);
			});
		}
	}
	jsColor('#meigee_blacknwhite_design_base');
	jsColor('#meigee_blacknwhite_design_catlabels');
	jsColor('#meigee_blacknwhite_design_menu', '#meigee_blacknwhite_design_menu_block_border_width, #meigee_blacknwhite_design_menu_products_border_width');
	jsColor('#meigee_blacknwhite_design_headerslider');
	jsColor('#meigee_blacknwhite_design_buttons', '#meigee_blacknwhite_design_buttons_buttons_border_width, #meigee_blacknwhite_design_buttons_buttons_2_border_width');
	jsColor('#meigee_blacknwhite_design_social_links', '#meigee_blacknwhite_design_social_links_social_links_border_width');
	jsColor('#meigee_blacknwhite_design_footer', '#meigee_blacknwhite_design_footer_footer_top_title_border_width, #meigee_blacknwhite_design_footer_footer_medium_title_border_width');
	jsColor('#meigee_blacknwhite_design_products', '#meigee_blacknwhite_design_products_products_border_width, #meigee_blacknwhite_design_products_products_divider_width');
	jsColor('#meigee_blacknwhite_design_header');
	jsColor('#meigee_blacknwhite_design_parallax', '#meigee_blacknwhite_design_parallax_transparent_header_bg_value, #meigee_blacknwhite_design_parallax_header_search_and_switchers_transparent_bg_value, #meigee_blacknwhite_design_parallax_header_search_and_switchers_transparent_border_value, #meigee_blacknwhite_design_parallax_transparent_menu_blockbg_value, #meigee_blacknwhite_design_parallax_menu_block_border_transparent_value, #meigee_blacknwhite_design_parallax_menu_block_border_width, #meigee_blacknwhite_design_parallax_transparent_menu_linkbg_value, #meigee_blacknwhite_design_parallax_transparent_menu_linkbg_h_value, #meigee_blacknwhite_design_parallax_transparent_menu_linkbg_a_value, #meigee_blacknwhite_design_parallax_menu_wishlist_link_transparent_bg_value, #meigee_blacknwhite_design_parallax_menu_wishlist_link_transparent_bg_h_value, #meigee_blacknwhite_design_parallax_menu_cart_link_transparent_bg_value, #meigee_blacknwhite_design_parallax_menu_cart_link_transparent_bg_h_value');
	jsColor('#meigee_blacknwhite_design_page_not_found', '#meigee_blacknwhite_design_page_not_found_button_border_width');
	jsColor('#meigee_blacknwhite_design_content', '#meigee_blacknwhite_design_content_page_title_border_width');
});