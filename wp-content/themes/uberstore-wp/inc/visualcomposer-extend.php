<?php
// Shortcodes 
$shortcodes = THB_THEME_ROOT_ABS.'/vc_templates/';
$files = glob($shortcodes.'/thb_?*.php');
foreach ($files as $filename)
{
	require get_template_directory().'/vc_templates/'.basename($filename);
}


/* Visual Composer Mappings */

// Adding animation to columns
vc_add_param("vc_column", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Full Height Column",
	"param_name" => "full_height",
	"value" => array(
		"" => "true"
	),
	"description" => "If enabled, this will cause this column to always fill the height of the window."
));
vc_add_param("vc_column", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Animation",
	"admin_label" => true,
	"param_name" => "animation",
	"value" => array(
		"None" => "",
		"Left" => "animation right-to-left",
		"Right" => "animation left-to-right",
		"Top" => "animation bottom-to-top",
		"Bottom" => "animation top-to-bottom",
		"Scale" => "animation scale",
		"Fade" => "animation fade-in"
	),
	"description" => ""
));
vc_add_param("vc_column_inner", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Full Height Column",
	"param_name" => "full_height",
	"value" => array(
		"" => "true"
	),
	"description" => "If enabled, this will cause this column to always fill the height of the window."
));
vc_add_param("vc_column_inner", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Animation",
	"admin_label" => true,
	"param_name" => "animation",
	"value" => array(
		"None" => "",
		"Left" => "animation right-to-left",
		"Right" => "animation left-to-right",
		"Top" => "animation bottom-to-top",
		"Bottom" => "animation top-to-bottom",
		"Scale" => "animation scale",
		"Fade" => "animation fade-in"
	),
	"description" => ""
));

// Add parameters to rows
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Disable Column Padding",
	"param_name" => "column_padding",
	"value" => array(
		"" => "false"
	),
	"description" => "You can have columns without spaces using this option"
));
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Remove Row Padding",
	"param_name" => "row_padding",
	"value" => array(
		"" => "true"
	),
	"description" => "If you enable this, this row won't leave padding on the sides"
));
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Enable Full Width",
	"param_name" => "thb_full_width",
	"value" => array(
		"" => "true"
	),
	"description" => "If you enable this, this row will fill the screen"
));
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Equal-height Columns",
	"param_name" => "equal_height",
	"value" => array(
		"" => "true"
	),
	"description" => "You can have columns with same height using this option"
));

vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Full Height Row",
	"param_name" => "full_height",
	"value" => array(
		"" => "true"
	),
	"description" => "If enabled, this will cause this row to always fill the height of the window."
));
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Vertical Center Contents",
	"param_name" => "vertical_center",
	"value" => array(
		"" => "true"
	),
	"description" => "You can vertically center contents. Works only if Full Height Row option is enabled.",
	"dependency" => Array('element' => "full_height", 'value' => array('true'))
));
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Enable Parallax Background",
	"param_name" => "enable_parallax",
	"value" => array(
		"" => "false"
	)
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Parallax Background Speed",
	"param_name" => "parallax_speed",
	"value" => "0.5",
	"dependency" => array(
		"element" => "enable_parallax",
		"not_empty" => true
	),
	"description" => "A value between 0 and 1 is recommended"
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Video background (mp4)",
	"param_name" => "bg_video_src_mp4",
	"value" => "",
	"description" => "You must include the ogv & the mp4 format to render your video with cross browser compatibility. OGV is optional. Video must be in a 16:9 aspect ratio. The row background image will be used as in mobile devices."
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Video background (ogv)",
	"param_name" => "bg_video_src_ogv",
	"value" => ""
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Video background (webm)",
	"param_name" => "bg_video_src_webm",
	"value" => ""
));
vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Video Overlay Color",
	"param_name" => "bg_video_overlay_color",
	"value" => "",
	"description" => "If you want, you can select an overlay color."
));

vc_add_param("vc_row_inner", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Disable Column Padding",
	"param_name" => "column_padding",
	"value" => array(
		"" => "false"
	),
	"description" => "You can have columns without spaces using this option"
));
vc_add_param("vc_row_inner", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Remove Row Padding",
	"param_name" => "row_padding",
	"value" => array(
		"" => "true"
	),
	"description" => "If you enable this, this row won't leave padding on the sides"
));
vc_add_param("vc_row_inner", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Enable Max Width",
	"param_name" => "max_width",
	"value" => array(
		"" => "true"
	),
	"description" => "If you enable this, this row will not fill the container."
));
vc_add_param("vc_row_inner", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Equal-height Columns",
	"param_name" => "equal_height",
	"value" => array(
		"" => "true"
	),
	"description" => "You can have columns with same height using this option"
));

// Remove parameters
vc_remove_param( "vc_row", "full_width" );
vc_remove_param( "vc_row", "content_placement" );
vc_remove_param( "vc_row", "parallax" );
vc_remove_param( "vc_row", "video_bg" );
vc_remove_param( "vc_row", "video_bg_url" );
vc_remove_param( "vc_row", "video_bg_parallax" );
vc_remove_param( "vc_row", "parallax_image" );

vc_remove_param( "vc_tta_tabs", "style" );
vc_remove_param( "vc_tta_tabs", "shape" );
vc_remove_param( "vc_tta_tabs", "color" );
vc_remove_param( "vc_tta_tabs", "spacing" );
vc_remove_param( "vc_tta_tabs", "gap" );
vc_remove_param( "vc_tta_tabs", "alignment" );
vc_remove_param( "vc_tta_tabs", "pagination_color" );
vc_remove_param( "vc_tta_tabs", "pagination_style" );

vc_remove_param( "vc_tta_tour", "style" );
vc_remove_param( "vc_tta_tour", "shape" );
vc_remove_param( "vc_tta_tour", "color" );
vc_remove_param( "vc_tta_tour", "spacing" );
vc_remove_param( "vc_tta_tour", "gap" );
vc_remove_param( "vc_tta_tour", "pagination_style" );
vc_remove_param( "vc_tta_tour", "pagination_color" );

vc_remove_param( "vc_tta_accordion", "style" );
vc_remove_param( "vc_tta_accordion", "shape" );
vc_remove_param( "vc_tta_accordion", "color" );
vc_remove_param( "vc_tta_accordion", "spacing" );
vc_remove_param( "vc_tta_accordion", "gap" );
vc_remove_param( "vc_tta_accordion", "c_align" );
vc_remove_param( "vc_tta_accordion", "c_icon" );
vc_remove_param( "vc_tta_accordion", "c_position" );

// Button shortcode
vc_map( array(
	"name" => __("Button"),
	"base" => "thb_button",
	"icon" => "thb_vc_ico_button",
	"class" => "thb_vc_sc_button",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Caption"),
			"admin_label" => true,
			"param_name" => "caption",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Link URL"),
			"param_name" => "link",
			"value" => "",
			"description" => ""
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon',
			'value' => 'fa fa-adjust', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => true, // default true, display an "EMPTY" icon?
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Open link in"),
			"param_name" => "target_blank",
			"value" => array(
				"Same window" => "",
				"New window" => "true"
			),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Style"),
			"param_name" => "size",
			"value" => array(
				"Small button" => "small",
				"Medium button" => "medium",
				"Big button" => "large"
			),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Button color"),
			"param_name" => "color",
			"value" => array(
				"White" => "white",
				"Light Grey" => "grey",
				"Black" => "black",
				"Blue" => "blue",
				"Green" => "green",
				"Yellow" => "yellow",
				"Orange" => "orange",
				"Pink" => "pink",
				"Petrol Green" => "petrol",
				"Gray" => "darkgrey"
			),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Animation"),
			"param_name" => "animation",
			"value" => array(
				"None" => "",
				"Left" => "animation right-to-left",
				"Right" => "animation left-to-right",
				"Top" => "animation bottom-to-top",
				"Bottom" => "animation top-to-bottom",
				"Scale" => "animation scale",
				"Fade" => "animation fade-in"
			),
			"description" => ""
		)
	)
) );

// Image shortcode
vc_map( array(
	"name" => "Image",
	"base" => "thb_image",
	"icon" => "thb_vc_ico_image",
	"class" => "thb_vc_sc_image",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
			"type" => "attach_image", //attach_images
			"class" => "",
			"heading" => "Select Image",
			"param_name" => "image",
			"description" => ""
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Full Width?",
			"param_name" => "full_width",
			"value" => array(
				"" => "true"
			),
			"description" => "If selected, the image will always fill its container"
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Animation",
			"param_name" => "animation",
			"value" => array(
				"None" => "",
				"Left" => "animation right-to-left",
				"Right" => "animation left-to-right",
				"Top" => "animation bottom-to-top",
				"Bottom" => "animation top-to-bottom",
				"Scale" => "animation scale",
				"Fade" => "animation fade-in"
			),
			"description" => ""
		),
		array(
		  "type" => "textfield",
		  "heading" => "Image size",
		  "param_name" => "img_size",
		  "description" => "Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use 'thumbnail' size."
		),
		array(
		  "type" => "dropdown",
		  "heading" => "Image alignment",
		  "param_name" => "alignment",
		  "value" => array("Align left" => "left", "Align right" => "right", "Align center" => "center"),
		  "description" => "Select image alignment."
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Link to Full-Width Image?",
			"param_name" => "lightbox",
			"value" => array(
				"" => "true"
			)
		),
		array(
		  "type" => "vc_link",
		  "heading" => "Image link",
		  "param_name" => "img_link",
		  "description" => "Enter url if you want this image to have link.",
		  "dependency" => Array('element' => "lightbox", 'is_empty' => true)
		)
	),
	"description" => "Add an animated image"
) );

// Styled Header
vc_map( array(
	"name" => __("Styled Header"),
	"base" => "thb_header",
	"icon" => "thb_vc_ico_styled",
	"class" => "thb_vc_sc_styled",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
		  "type" => "textfield",
		  "heading" => __("Title"),
		  "param_name" => "title",
		  "admin_label" => true,
		  "description" => __("Title of the header")
		),
		array(
		  "type" => "textfield",
		  "heading" => __("Sub-Title"),
		  "param_name" => "sub_title",
		  "description" => __("Sub - Title of the header. It's actually above the title.")
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon',
			'value' => 'fa fa-adjust', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => true, // default true, display an "EMPTY" icon?
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => __("Use image instead of icon?"),
			"param_name" => "is_image",
			"value" => array(
				"" => "true"
			),
			"description" => __("20px width is recommended (40px) for retina.")
		),
		array(
			"type" => "attach_image", //attach_images
			"class" => "",
			"heading" => __("Select Image"),
			"param_name" => "image",
			"description" => "",
			"dependency" => Array('element' => "is_image", 'not_empty' => true)
		)
	)
) );

// Products
vc_map( array(
	"name" => __("Products"),
	"base" => "thb_product",
	"icon" => "thb_vc_ico_product",
	"class" => "thb_vc_sc_product",
	"category" => "by Fuel Themes",
	"params"	=> array(
	  array(
	      "type" => "dropdown",
	      "heading" => __("Product Sort"),
	      "param_name" => "product_sort",
	      "value" => array(
	      	__('Best Sellers') => "best-sellers",
	      	__('Latest Products') => "latest-products",
	      	__('Featured Products') => "featured-products",
	      	__('Top Rated Products') => "top-rated",
	      	__('Sale Products') => "sale-products",
	      	__('By Category') => "by-category",
	      	__('By Product ID') => "by-id",
	      	),
	      "description" => __("Select the order of the products you'd like to show.")
	  ),
	  array(
	      "type" => "checkbox",
	      "heading" => __("Product Category"),
	      "param_name" => "cat",
	      "value" => thb_productCategories(),
	      "description" => __("Select the order of the products you'd like to show."),
	      "dependency" => Array('element' => "product_sort", 'value' => array('by-category'))
	  ),
	  array(
	      "type" => "textfield",
	      "heading" => __("Product IDs"),
	      "param_name" => "product_ids",
	      "description" => __("Enter the products IDs you would like to display seperated by comma"),
	      "dependency" => Array('element' => "product_sort", 'value' => array('by-id'))
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => __("Carousel"),
	      "param_name" => "carousel",
	      "value" => array(
	      	'Yes' => "yes",
	        'No' => "no",
	      	),
	      "description" => __("Select yes to display the products in a carousel.")
	  ),
	  array(
	      "type" => "textfield",
	      "class" => "",
	      "heading" => __("Number of items"),
	      "param_name" => "item_count",
	      "value" => "4",
	      "description" => __("The number of products to show."),
	      "dependency" => Array('element' => "product_sort", 'value' => array('by-category', 'featured-products', 'sale-products', 'top-rated', 'latest-products', 'best-sellers'))
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => __("Columns"),
	      "param_name" => "columns",
	      "admin_label" => true,
	      "value" => array(
	      	__('Four Columns') => "4",
	      	__('Three Columns') => "3",
	      	__('Two Columns') => "2"
	      ),
	      "description" => __("Select the layout of the products.")
	  ),
	)
) );

// Product List
vc_map( array(
	"name" => __("Product List"),
	"base" => "thb_product_list",
	"icon" => "thb_vc_ico_product_list",
	"class" => "thb_vc_sc_product_list",
	"category" => "by Fuel Themes",
	"params"	=> array(
		array(
		    "type" => "textfield",
		    "class" => "",
		    "heading" => __("Title"),
		    "param_name" => "title",
		    "value" => "",
		    "admin_label" => true,
		    "description" => __("Title of the widget")
		),
	  array(
	      "type" => "dropdown",
	      "heading" => __("Product Sort"),
	      "param_name" => "product_sort",
	      "value" => array(
	      	__('Best Sellers') => "best-sellers",
	      	__('Featured Products') => "featured-products",
	      	__('Latest Products') => "latest-products",
	      	__('Top Rated') => "top-rated",
	      	__('Sale Products') => "sale-products",
	      	__('By Product ID') => "by-id"
	      	),
	      "admin_label" => true,
	      "description" => __("Select the order of the products you'd like to show.")
	  ),
	  array(
	      "type" => "textfield",
	      "heading" => __("Product IDs"),
	      "param_name" => "product_ids",
	      "description" => __("Enter the products IDs you would like to display seperated by comma"),
	      "dependency" => Array('element' => "product_sort", 'value' => array('by-id'))
	  ),
	  array(
	      "type" => "textfield",
	      "class" => "",
	      "heading" => __("Number of items"),
	      "param_name" => "item_count",
	      "value" => "4",
	      "description" => __("The number of products to show."),
	      "dependency" => Array('element' => "product_sort", 'value' => array('by-category', 'featured-products', 'sale-products', 'top-rated', 'latest-products', 'best-sellers'))
	  )
	)
) );

// Product Categories
vc_map( array(
	"name" => __("Product Categories"),
	"base" => "thb_product_categories",
	"icon" => "thb_vc_ico_product_categories",
	"class" => "thb_vc_sc_product_categories",
	"category" => "by Fuel Themes",
	"params"	=> array(
	  array(
	      "type" => "checkbox",
	      "heading" => __("Product Category"),
	      "param_name" => "cat",
	      "value" => thb_productCategories(),
	      "description" => __("Select the categories you would like to display")
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => __("Carousel"),
	      "param_name" => "carousel",
	      "value" => array(
	      	'Yes' => "yes",
	        'No' => "no",
	      	),
	      "description" => __("Select yes to display the categories in a carousel.")
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => __("Columns"),
	      "param_name" => "columns",
	      "admin_label" => true,
	      "value" => array(
	      	__('Four Columns') => "4",
	      	__('Three Columns') => "3",
	      	__('Two Columns') => "2"
	      ),
	      "description" => __("Select the layout of the products.")
	  ),
	)
) );

// Posts
vc_map( array(
	"name" => __("Posts"),
	"base" => "thb_post",
	"icon" => "thb_vc_ico_post",
	"class" => "thb_vc_sc_post",
	"category" => "by Fuel Themes",
	"params"	=> array(
	  array(
	      "type" => "dropdown",
	      "heading" => __("Carousel"),
	      "param_name" => "carousel",
	      "value" => array(
	      	'Yes' => "yes",
	        'No' => "no",
	      	),
	      "description" => __("Select yes to display the products in a carousel.")
	  ),
	  array(
	  	"type" => "dropdown",
	  	"heading" => "Post Source",
	  	"param_name" => "source",
	  	"value" => array(
	  		'Most Recent' => "most-recent",
	  		'By Category' => "by-category",
	  		'By Post ID' => "by-id",
	  		'By Tag' => "by-tag",
	  		'By Share Count' => "by-share",
	  		'By Author' => "by-author",
	  		),
	  	"admin_label" => true,
	  	"description" => "Select the source of the posts you'd like to show."
	  ),
	  array(
	    "type" => "checkbox",
	    "heading" => "Post Categories",
	    "param_name" => "cat",
	    "value" => thb_blogCategories(),
	    "description" => "Which categories would you like to show?",
	    "dependency" => Array('element' => "source", 'value' => array('by-category'))
	  ),
	  array(
	    "type" => "textfield",
	    "class" => "",
	    "heading" => "Number of posts",
	    "param_name" => "item_count",
	    "value" => "4",
	    "description" => "The number of posts to show.",
	    "dependency" => Array('element' => "source", 'value' => array('by-category', 'by-tag', 'by-share', 'by-author', 'most-recent'))
	  ),
	  array(
	    "type" => "textfield",
	    "heading" => "Post IDs",
	    "param_name" => "post_ids",
	    "description" => "Enter the post IDs you would like to display seperated by comma",
	    "dependency" => Array('element' => "source", 'value' => array('by-id'))
	  ),
	  array(
	    "type" => "textfield",
	    "heading" => "Tag slugs",
	    "param_name" => "tag_slugs",
	    "description" => "Enter the tag slugs you would like to display seperated by comma",
	    "dependency" => Array('element' => "source", 'value' => array('by-tag'))
	  ),
	  array(
	    "type" => "textfield",
	    "heading" => "Author IDs",
	    "param_name" => "author_ids",
	    "description" => "Enter the Author IDs you would like to display seperated by comma",
	    "dependency" => Array('element' => "source", 'value' => array('by-author'))
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => __("Columns"),
	      "param_name" => "columns",
	      "admin_label" => true,
	      "value" => array(
	      	__('Four Columns') => "4",
	      	__('Three Columns') => "3",
	      	__('Two Columns') => "2"
	      ),
	      "description" => __("Select the layout of the posts.")
	  ),
	)
) );

// Icon List shortcode
vc_map( array(
	"name" => __("Icon List"),
	"base" => "thb_iconlist",
	"icon" => "thb_vc_ico_iconlist",
	"class" => "thb_vc_sc_iconlist",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon',
			'value' => 'fa fa-adjust', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Icon color"),
			"param_name" => "color",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Animation"),
			"param_name" => "animation",
			"value" => array(
				"None" => "",
				"Left" => "animation right-to-left",
				"Right" => "animation left-to-right",
				"Top" => "animation bottom-to-top",
				"Bottom" => "animation top-to-bottom",
				"Scale" => "animation scale",
				"Fade" => "animation fade-in"
			),
			"description" => ""
		),
		array(
			"type" => "exploded_textarea",
			"class" => "",
			"heading" => __("List Items"),
			"admin_label" => true,
			"param_name" => "content",
			"value" => "",
			"description" => __("Every new line will be treated as a list item")
		)
	)
) );
// Iconbox shortcode
vc_map( array(
	"name" => __("Iconbox"),
	"base" => "thb_iconbox",
	"icon" => "thb_vc_ico_iconbox",
	"class" => "thb_vc_sc_iconbox",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Type"),
			"param_name" => "type",
			"value" => array(
				"Top Icon - Type 1" => "top type1",
				"Top Icon - Type 2" => "top type2",
				"Top Icon - Type 3" => "top type3",
				"Left Icon - Round" => "left type1",
				"Left Icon - Square" => "left type2",
				"Left Icon - Only Icon" => "left type3",
				"Right Icon - Round" => "right type1",
				"Right Icon - Square" => "right type2",
				"Right Icon - Only Icon" => "right type3"
			),
			"description" => ""
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon',
			'value' => 'fa fa-adjust', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Color"),
			"param_name" => "color",
			"value" => "",
			"description" => __("Leave empty to use default color")
		),
		array(
			"type" => "attach_image", //attach_images
			"class" => "",
			"heading" => __("Image"),
			"param_name" => "image",
			"description" => __("Use image instead of icon? Image uploaded should be 130*130 or 260*260 for retina. For small icons, 78*78 or 156*156 for retina."),
			"dependency" => Array('element' => "type", 'value' => array('top type1', 'top type2', 'top type3', 'left type1', 'left type2', 'right type1', 'right type2'))
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Heading"),
			"param_name" => "heading",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "textarea",
			"class" => "",
			"heading" => __("Content"),
			"admin_label" => true,
			"param_name" => "content",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Animation"),
			"param_name" => "animation",
			"value" => array(
				"None" => "",
				"Left" => "animation right-to-left",
				"Right" => "animation left-to-right",
				"Top" => "animation bottom-to-top",
				"Bottom" => "animation top-to-bottom",
				"Scale" => "animation scale",
				"Fade" => "animation fade-in"
			),
			"description" => ""
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => __("Add Button?"),
			"param_name" => "use_btn",
			"value" => array(
				"" => "true"
			),
			"description" => __("Check if you want to add a button.")
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Content"),
			"admin_label" => true,
			"param_name" => "btn_content",
			"value" => "",
			"description" => "",
			"dependency" => Array('element' => "use_btn", 'not_empty' => true)
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Button Caption"),
			"admin_label" => true,
			"param_name" => "btn_content",
			"value" => "",
			"description" => "",
			"dependency" => Array('element' => "use_btn", 'not_empty' => true)
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Button Link URL"),
			"param_name" => "btn_link",
			"value" => "",
			"description" => "",
			"dependency" => Array('element' => "use_btn", 'not_empty' => true)
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Button Icon"),
			"param_name" => "btn_icon",
			"value" => thb_getIconArray(),
			"description" => "",
			"dependency" => Array('element' => "use_btn", 'not_empty' => true)
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Button Open link in"),
			"param_name" => "btn_target_blank",
			"value" => array(
				"Same window" => "",
				"New window" => "true"
			),
			"description" => "",
			"dependency" => Array('element' => "use_btn", 'not_empty' => true)
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Button Style"),
			"param_name" => "btn_size",
			"value" => array(
				"Small button" => "small",
				"Medium button" => "medium",
				"Big button" => "big"
			),
			"description" => "",
			"dependency" => Array('element' => "use_btn", 'not_empty' => true)
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Button color"),
			"param_name" => "btn_color",
			"value" => array(
				"White" => "white",
				"Light Grey" => "lightgrey",
				"Black" => "black",
				"Blue" => "blue",
				"Green" => "green",
				"Yellow" => "yellow",
				"Orange" => "orange",
				"Pink" => "pink",
				"Petrol Green" => "petrol",
				"Gray" => "gray"
			),
			"description" => "",
			"dependency" => Array('element' => "use_btn", 'not_empty' => true)
		)
	)
) );

// Look Book
vc_map( array(
	"name" => __("Look Book"),
	"base" => "thb_lookbook",
	"icon" => "thb_vc_ico_lookbook",
	"class" => "thb_vc_sc_lookbook",
	"category" => "by Fuel Themes",
	"params"	=> array(
	  array(
	      "type" => "checkbox",
	      "heading" => __("Product Category"),
	      "param_name" => "cat",
	      "value" => thb_productCategories(),
	      "description" => __("Select the order of the products you'd like to show.")
	  ),
	  array(
	      "type" => "textfield",
	      "class" => "",
	      "heading" => __("Number of items"),
	      "param_name" => "item_count",
	      "value" => "4",
	      "description" => __("The number of products to show.")
	  ),
	  array(
	  	"type" => "textarea_html",
	  	"class" => "",
	  	"heading" => __("Content"),
	  	"admin_label" => true,
	  	"param_name" => "content",
	  	"value" => "",
	  	"description" => __("Enter a starting content to be displayed before lookbook products.")
	  )
	)
) );

// Product Grid
vc_map( array(
	"name" => __("Product Grid"),
	"base" => "thb_productgrid",
	"icon" => "thb_vc_ico_productgrid",
	"class" => "thb_vc_sc_productgrid",
	"category" => "by Fuel Themes",
	"params"	=> array(
	  array(
	      "type" => "dropdown",
	      "heading" => __("Product Sort"),
	      "param_name" => "product_sort",
	      "value" => array(
	      	__('Best Sellers') => "best-sellers",
	      	__('Latest Products') => "latest-products",
	      	__('Top Rated') => "top-rated",
	      	__('Sale Products') => "sale-products",
	      	__('By Category') => "by-category",
	      	__('By Product ID') => "by-id",
	      	),
	      "admin_label" => true,
	      "description" => __("Select the order of the products you'd like to show.")
	  ),
	  array(
	      "type" => "checkbox",
	      "heading" => __("Product Category"),
	      "param_name" => "cat",
	      "value" => thb_productCategories(),
	      "description" => __("Select the order of the products you'd like to show."),
	      "dependency" => Array('element' => "product_sort", 'value' => array('by-category'))
	  ),
	  array(
	      "type" => "textfield",
	      "heading" => __("Product IDs"),
	      "param_name" => "product_ids",
	      "description" => __("Enter the products IDs you would like to display seperated by comma"),
	      "dependency" => Array('element' => "product_sort", 'value' => array('by-id'))
	  ),
	  array(
	      "type" => "textfield",
	      "class" => "",
	      "heading" => __("Number of items"),
	      "param_name" => "item_count",
	      "value" => "4",
	      "description" => __("The number of products to show.")
	  )
	)
) );
// Counter
vc_map( array(
	"name" => __("Counter"),
	"base" => "thb_counter",
	"icon" => "thb_vc_ico_counter",
	"class" => "thb_vc_sc_counter",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon',
			'value' => 'fa fa-adjust', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Color"),
			"param_name" => "color",
			"value" => "",
			"description" => __("Leave empty to use default color")
		),
		array(
			"type" => "attach_image", //attach_images
			"class" => "",
			"heading" => __("Image"),
			"param_name" => "image",
			"description" => __("Use image instead of icon? Image uploaded should be 70*70 or 140*140 for retina.")
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Number to count to"),
			"param_name" => "countto",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Speed of the counter animation"),
			"param_name" => "speed",
			"value" => "",
			"description" => __("Speed of the counter animation, default 1500")
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Heading"),
			"param_name" => "heading",
			"value" => "",
			"admin_label" => true,
			"description" => ""
		)
	)
) );


// Notification shortcode
vc_map( array(
	"name" => __("Notification"),
	"base" => "thb_notification",
	"icon" => "thb_vc_ico_notification",
	"class" => "thb_vc_sc_notification",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Type"),
			"param_name" => "type",
			"value" => array(
				"Information" => "information",
				"Success" => "success",
				"Warning" => "warning",
				"Error" => "error",
				"Note" => "note"
			),
			"description" => ""
		),
		array(
			"type" => "textarea",
			"class" => "",
			"heading" => __("Content"),
			"admin_label" => true,
			"param_name" => "content",
			"value" => "",
			"description" => ""
		)
	)
) );

// Banner shortcode
vc_map( array(
	"name" => __("Banner"),
	"base" => "thb_banner",
	"icon" => "thb_vc_ico_banner",
	"class" => "thb_vc_sc_banner",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Background Color"),
			"param_name" => "banner_color",
			"value" => "",
			"description" => __("Select Background Color")
		),
		array(
			"type" => "attach_image", //attach_images
			"class" => "",
			"heading" => __("Select Background Image"),
			"param_name" => "banner_bg",
			"description" => ""
		),
		array(
		  "type" => "textfield",
		  "heading" => __("Banner Height"),
		  "param_name" => "banner_height",
		  "description" => __("Enter height of the banner in px.")
		),
		array(
		  "type" => "textfield",
		  "heading" => __("Padding"),
		  "param_name" => "banner_padding",
		  "description" => __("Enter padding value of the content. <small>This does not affect border offset values, only the content.</small>")
		),
		
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Banner Type"),
			"param_name" => "type",
			"value" => array(
				"Type - 1 (5px Border with offset)" => "type1",
				"Type - 2 (10px Border)" => "type2",
				"Type - 3 (Call to Action style without border)" => "type3",
				"Type - 4 (Simple no border)" => "type4",
				"Type - 5 (With overlay link)" => "type5",
			),
			"description" => ""
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Border Color"),
			"param_name" => "banner_border_color",
			"value" => "",
			"description" => __("Select Border Color if the banner type supports it"),
			"dependency" => array(
				"element" => "type",
				"value" => array('type1', 'type2')
			)
		),
		array(
		  "type" => "textfield",
		  "heading" => __("Title"),
		  "param_name" => "title",
		  "dependency" => array(
		  	"element" => "type",
		  	"value" => array('type3')
		  )
		),
		array(
		  "type" => "textfield",
		  "heading" => __("Sub Title"),
		  "param_name" => "subtitle",
		  "dependency" => array(
		  	"element" => "type",
		  	"value" => array('type3')
		  )
		),
		array(
		  "type" => "textfield",
		  "heading" => __("Button Text"),
		  "param_name" => "button_text",
		  "dependency" => array(
		  	"element" => "type",
		  	"value" => array('type3')
		  )
		),
		array(
		  "type" => "textfield",
		  "heading" => __("Button Link"),
		  "param_name" => "button_link",
		  "dependency" => array(
		  	"element" => "type",
		  	"value" => array('type3')
		  )
		),
		array(
		  "type" => "textfield",
		  "heading" => __("Overlay Link"),
		  "param_name" => "overlay_link",
		  "dependency" => array(
		  	"element" => "type",
		  	"value" => array('type5')
		  )
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => __("Enable parallax"),
			"param_name" => "enable_parallax",
			"value" => array(
				"" => "false"
			)
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Parallax Speed"),
			"param_name" => "parallax_speed",
			"value" => "1",
			"dependency" => array(
				"element" => "enable_parallax",
				"not_empty" => true
			),
			"description" => __("A value between 0 and 10 is recommended. Lower is faster")
		),
		array(
		  "type" => "dropdown",
		  "heading" => __("Text alignment"),
		  "param_name" => "alignment",
		  "value" => array( __("Align center") => "", __("Align left") => "textleft", __("Align right") => "textright" ),
		  "description" => __("Select text alignment."),
		  "dependency" => array(
		  	"element" => "type",
		  	"value" => array('type1', 'type2', 'type4', 'type5')
		  )
		),
		array(
			"type" => "textarea_html",
			"class" => "",
			"heading" => __("Content"),
			"param_name" => "content",
			"value" => "",
			"admin_label" => true,
			"description" => __("Content you would like to place inside the banner"),
			"dependency" => array(
				"element" => "type",
				"value" => array('type1', 'type2', 'type4', 'type5')
			)
		)
	)
) );
// Banner shortcode
vc_map( array(
	"name" => __("Gap"),
	"base" => "thb_gap",
	"icon" => "thb_vc_ico_gap",
	"class" => "thb_vc_sc_gap",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
		  "type" => "textfield",
		  "heading" => __("Gap Height"),
		  "param_name" => "height",
		  "admin_label" => true,
		  "description" => __("Enter height of the gap in px.")
		)
	)
) );
// Progress Bar Shortcode
vc_map( array(
	"name" => __("Progress Bar"),
	"base" => "thb_progressbar",
	"icon" => "thb_vc_ico_progressbar",
	"class" => "thb_vc_sc_progressbar",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
		  "type" => "exploded_textarea",
		  "heading" => __("Graphic values"),
		  "param_name" => "values",
		  "description" => __('Input graph values here. Divide values with linebreaks (Enter). Example: 90|Development', 'js_composer'),
		  "value" => "90|Development,80|Design,70|Marketing"
		),
		array(
		  "type" => "dropdown",
		  "heading" => __("Bar color"),
		  "param_name" => "bgcolor",
		  "value" => array(
		  	"Light Grey" => "lightgrey",
		  	"Black" => "black",
		  	"Blue" => "blue",
		  	"Green" => "green",
		  	"Yellow" => "yellow",
		  	"Orange" => "orange",
		  	"Pink" => "pink",
		  	"Petrol Green" => "petrol",
		  	"Gray" => "gray"
		  ),
		  "description" => __("Select bar background color.")
		)
	)
) );

// Testimonials Shortcode
vc_map( array(
	"name" => __("Testimonials"),
	"base" => "thb_testimonials",
	"icon" => "thb_vc_ico_testimonials",
	"class" => "thb_vc_sc_testimonials",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
		  "type" => "exploded_textarea",
		  "heading" => __("Testimonials"),
		  "param_name" => "values",
		  "admin_label" => true,
		  "description" => __('Enter testimonials here. Divide values with linebreaks (Enter). Example: Abraham Lincoln|Lorem ipsum ....', 'js_composer'),
		  "value" => "Abraham Lincoln|Lorem Ipsum is simply dummy text of the printing and typesetting industry,George Bush|Lorem Ipsum is simply dummy text of the printing and typesetting industry."
		)
	)
) );

// Team Member shortcode
vc_map( array(
	"name" => __("Team Member"),
	"base" => "thb_teammember",
	"icon" => "thb_vc_ico_teammember",
	"class" => "thb_vc_sc_teammember",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
			"type" => "attach_image", //attach_images
			"class" => "",
			"heading" => __("Select Team Member Image"),
			"param_name" => "image",
			"description" => __("Minimum size is 270x270 pixels")
		),
		array(
		  "type" => "textfield",
		  "heading" => __("Name"),
		  "param_name" => "name",
		  "admin_label" => true,
		  "description" => __("Enter name of the team member")
		),
		array(
		  "type" => "textfield",
		  "heading" => __("Position"),
		  "param_name" => "position",
		  "description" => __("Enter position/title of the team member")
		),
		array(
		  "type" => "textfield",
		  "heading" => __("Facebook"),
		  "param_name" => "facebook",
		  "description" => __("Enter Facebook Link")
		),
		array(
		  "type" => "textfield",
		  "heading" => __("Twitter"),
		  "param_name" => "twitter",
		  "description" => __("Enter Twitter Link")
		),
		array(
		  "type" => "textfield",
		  "heading" => __("Google Plus"),
		  "param_name" => "googleplus",
		  "description" => __("Enter Google Plus Link")
		),
		array(
		  "type" => "textfield",
		  "heading" => __("Linkedin"),
		  "param_name" => "linkedin",
		  "description" => __("Enter Linkedin Link")
		)
	)
) );

// Clients shortcode
vc_map( array(
	"name" => __("Clients"),
	"base" => "thb_clients",
	"icon" => "thb_vc_ico_clients",
	"class" => "thb_vc_sc_clients",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
			"type" => "attach_images", //attach_images
			"class" => "",
			"heading" => __("Select Images"),
			"param_name" => "images",
			"description" => __("Add as many client images as possible.")
		)
	)
) );
