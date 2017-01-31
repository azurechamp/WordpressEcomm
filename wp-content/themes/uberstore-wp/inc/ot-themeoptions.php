<?php
/**
 * Initialize the options before anything else. 
 */
add_action( 'admin_init', 'thb_custom_theme_options', 1 );

/**
 * Theme Mode demo code of all the available option types.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
function thb_custom_theme_options() {
  
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Create a custom settings array that we pass to 
   * the OptionTree Settings API Class.
   */
  $custom_settings = array(
    'sections'        => array(
      array(
        'title'       => 'General',
        'id'          => 'general'
      ),
      array(
        'title'       => 'Shop Settings',
        'id'          => 'shop'
      ),
      array(
        'title'       => 'Header Settings',
        'id'          => 'header'
      ),
      array(
        'title'       => 'Footer Settings',
        'id'          => 'footer'
      ),
      array(
        'title'       => 'Customization',
        'id'          => 'customization'
      ),
      array(
        'title'       => 'Contact',
        'id'          => 'contact'
      ),
      array(
        'title'       => 'Misc',
        'id'          => 'misc'
      ),
      array(
        'title'       => 'Demo Content',
        'id'          => 'import'
      )
    ),
    'settings'        => array(
    	array(
    	  'label'       => 'Boxed Layout',
    	  'id'          => 'boxed',
    	  'type'        => 'radio',
    	  'desc'        => 'The content is contained and the body background is visible from the sides.',
    	  'choices'     => array(
    	    array(
    	      'label'       => 'Yes',
    	      'value'       => 'yes'
    	    ),
    	    array(
    	      'label'       => 'No',
    	      'value'       => 'no'
    	    )
    	  ),
    	  'std'         => 'no',
    	  'section'     => 'general'
    	),
    	array(
    		'label'       => 'Blog Style',
    		'id'          => 'blog_style',
    		'type'        => 'radio',
    		'desc'        => 'Which blog style would you like to use?',
    		'choices'     => array(
    		  array(
    			'label'       => 'Standard',
    			'value'       => 'style1'
    		  ),
    		  array(
    			'label'       => 'Grid',
    			'value'       => 'style2'
    		  )
    		),
    		'std'         => 'style1',
    		'section'     => 'general'
    	  ),
      array(
        'label'       => 'Shop Header',
        'id'          => 'shop_header',
        'type'        => 'textarea',
        'desc'        => 'This content appears on top of the shop page. You can use your shortcodes here. <small>You can create your content using visual composer and then copy its text here</small>',
        'rows'        => '4',
        'section'     => 'shop'
      ),
      array(
        'label'       => 'Shop Sidebar',
        'id'          => 'shop_sidebar',
        'type'        => 'radio',
        'desc'        => 'Would you like to display sidebar on shop main and category pages?',
        'choices'     => array(
          array(
            'label'       => 'No Sidebar',
            'value'       => 'no'
          ),
          array(
            'label'       => 'Right Sidebar',
            'value'       => 'right'
          ),
          array(
            'label'       => 'Left Sidebar',
            'value'       => 'left'
          )
        ),
        'std'         => 'no',
        'section'     => 'shop'
      ),
      array(
        'label'       => 'Products per Page',
        'id'          => 'shop_product_count',
        'type'        => 'text',
        'desc'        => 'Number of products to show on shop pages.',
        'std'         => '12',
        'section'     => 'shop'
      ),
      array(
        'label'       => 'Product Hover Animation',
        'id'          => 'product_hover',
        'type'        => 'radio',
        'desc'        => 'Sliding or fading animation?',
        'choices'     => array(
          array(
            'label'       => 'Slide',
            'value'       => 'slide'
          ),
          array(
            'label'       => 'Fade',
            'value'       => 'fade'
          )
        ),
        'std'         => 'slide',
        'section'     => 'shop'
      ),
      array(
        'label'       => 'Reverse Product Hover Animation',
        'id'          => 'product_hover_reverse',
        'type'        => 'on_off',
        'desc'        => 'You can reverse the product animation if you like',
        'section'     => 'shop',
        'std'         => 'off'
      ),
      array(
        'label'       => 'Header shopping cart',
        'id'          => 'header_cart',
        'type'        => 'on_off',
        'desc'        => 'Would you like to display the shopping cart inside the header?',
        'section'     => 'shop',
        'std'         => 'on'
      ),
      array(
        'id'          => 'misc_tab0',
        'label'       => 'General',
        'type'        => 'tab',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Copyright Text',
        'id'          => 'copyright',
        'type'        => 'text',
        'desc'        => 'Copyright Text at the bottom left',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Extra CSS',
        'id'          => 'extra_css',
        'type'        => 'css',
        'desc'        => 'Any CSS that you would like to add to the theme',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Google Analytics',
        'id'          => 'ga',
        'type'        => 'textarea-simple',
        'desc'        => 'Google analytics field. Your GA code will be entered at the bottom of the theme',
        'rows'        => '5',
        'section'     => 'misc'
      ),
      array(
        'id'          => 'misc_tab1',
        'label'       => 'Create Sidebars',
        'type'        => 'tab',
        'section'     => 'misc'
      ),
      array(
        'id'          => 'sidebars_text',
        'label'       => 'About the sidebars',
        'desc'        => 'All sidebars that you create here will appear both in the Widgets Page(Appearance > Widgets), from where you will have to configure them, and in the pages, where you will be able to choose a sidebar for each page',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Create Sidebars',
        'id'          => 'sidebars',
        'type'        => 'list-item',
        'desc'        => 'Please choose a unique title for each sidebar!',
        'section'     => 'misc',
        'settings'    => array(
          array(
            'label'       => 'ID',
            'id'          => 'id',
            'type'        => 'text',
            'desc'        => 'Please write a lowercase id, with <strong>no spaces</strong>'
          )
        )
      ),
      array(
        'id'          => 'misc_tab2',
        'label'       => 'Twitter oAuth',
        'type'        => 'tab',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Twitter Username',
        'id'          => 'twitter_bar_username',
        'type'        => 'text',
        'desc'        => 'Username to pull tweets for',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Consumer Key',
        'id'          => 'twitter_bar_consumerkey',
        'type'        => 'text',
        'desc'        => 'Visit <a href="https://dev.twitter.com/apps">this link</a> in a new tab, sign in with your account, click on Create a new application and create your own keys in case you dont have already',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Consumer Secret',
        'id'          => 'twitter_bar_consumersecret',
        'type'        => 'text',
        'desc'        => 'Visit <a href="https://dev.twitter.com/apps">this link</a> in a new tab, sign in with your account, click on Create a new application and create your own keys in case you dont have already',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Access Token',
        'id'          => 'twitter_bar_accesstoken',
        'type'        => 'text',
        'desc'        => 'Visit <a href="https://dev.twitter.com/apps">this link</a> in a new tab, sign in with your account, click on Create a new application and create your own keys in case you dont have already',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Access Token Secret',
        'id'          => 'twitter_bar_accesstokensecret',
        'type'        => 'text',
        'desc'        => 'Visit <a href="https://dev.twitter.com/apps">this link</a> in a new tab, sign in with your account, click on Create a new application and create your own keys in case you dont have already',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Select Your Demo',
        'id'          => 'demo-select',
        'type'        => 'radio-image',
        'std'         => '0',
        'section'     => 'import'
      ),
      array(
        'id'          => 'demo_import',
        'label'       => 'About Importing Demo Content',
        'desc'        => '
        <div id="thb-import-messages"></div>
        <p style="text-align:center;"><a class="button button-primary button-hero" id="import-demo-content" href="#">Import Demo Content</a><br /><br />
        <small>Please press only once, and wait till you get the success message above.<br />If you \'re having trouble with import, please see: <a href="https://fuelthemes.ticksy.com/article/2706/">What To Do If Demo Content Import Fails</a></p>',
        'std'         => '0',
        'type'        => 'textblock',
        'section'     => 'import'
      ),
      array(
        'id'          => 'header_tab0',
        'label'       => 'General',
        'type'        => 'tab',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Header Style',
        'id'          => 'header_style',
        'type'        => 'radio',
        'desc'        => 'Which header style would you like to use?',
        'choices'     => array(
          array(
            'label'       => 'Style 1',
            'value'       => 'style1'
          ),
          array(
            'label'       => 'Style 2',
            'value'       => 'style2'
          ),
          array(
            'label'       => 'Style 3',
            'value'       => 'style3'
          ),
          array(
            'label'       => 'Style 4',
            'value'       => 'style4'
          )
        ),
        'std'         => 'style1',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Header Content',
        'id'          => 'header_line',
        'type'        => 'textarea',
        'desc'        => 'Some header styles, you can show a marketing line like "Free Shipping .. "',
        'rows'        => '2',
        'section'     => 'header'
      ),
      array(
        'id'          => 'header_tab1',
        'label'       => 'Logo',
        'type'        => 'tab',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Logo Upload',
        'id'          => 'logo',
        'type'        => 'upload',
        'desc'        => 'You can upload your own logo here. Since this theme is retina-ready, <strong>please upload a double size image.</strong> The image should be maximum 160 pixels in height.',
        'section'     => 'header'
      ),
      
      array(
        'label'       => 'Mobile Logo Upload',
        'id'          => 'logo_mobile',
        'type'        => 'upload',
        'desc'        => 'You can upload your own mobile logo here.  The image should be maximum 80 pixels in height. <small>Smaller version of your logo for mobile screens</small>',
        'section'     => 'header'
      ),
      array(
        'id'          => 'header_tab2',
        'label'       => 'Social Icons',
        'type'        => 'tab',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Facebook Link',
        'id'          => 'fb_link',
        'type'        => 'text',
        'desc'        => 'Facebook profile/page link',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Pinterest Link',
        'id'          => 'pinterest_link',
        'type'        => 'text',
        'desc'        => 'Pinterest profile/page link',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Twitter Link',
        'id'          => 'twitter_link',
        'type'        => 'text',
        'desc'        => 'Twitter profile/page link',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Google Plus Link',
        'id'          => 'googleplus_link',
        'type'        => 'text',
        'desc'        => 'Google Plus profile/page link',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Linkedin Link',
        'id'          => 'linkedin_link',
        'type'        => 'text',
        'desc'        => 'Linkedin profile/page link',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Instagram Link',
        'id'          => 'instragram_link',
        'type'        => 'text',
        'desc'        => 'Instagram profile/page link',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Xing Link',
        'id'          => 'xing_link',
        'type'        => 'text',
        'desc'        => 'Xing profile/page link',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Tumblr Link',
        'id'          => 'tumblr_link',
        'type'        => 'text',
        'desc'        => 'Tumblr profile/page link',
        'section'     => 'header'
      ),
      array(
        'id'          => 'cust_tab0',
        'label'       => 'Colors',
        'type'        => 'tab',
        'section'     => 'customization'
      ),
      array(
        'label'       => 'Accent Color',
        'id'          => 'accent_color',
        'type'        => 'colorpicker',
        'desc'        => 'Change the accent color used throughout the theme',
        'section'     => 'customization',
        'std'					=> '#10B4AA'
      ),
      array(
        'id'          => 'cust_tab1',
        'label'       => 'Typography',
        'type'        => 'tab',
        'section'     => 'customization'
      ),
      array(
        'label'       => 'Font Subsets',
        'id'          => 'font_subsets',
        'type'        => 'radio',
        'desc'        => 'You can add additional character subset specific to your language.',
        'choices'     => array(
        	array(
        	  'label'       => 'No Subset',
        	  'value'       => 'no-subset'
        	),
          array(
            'label'       => 'Greek',
            'value'       => 'greek'
          ),
          array(
            'label'       => 'Cyrillic',
            'value'       => 'cyrillic'
          ),
          array(
            'label'       => 'Vietnamese',
            'value'       => 'vietnamese'
          )
        ),
        'std'         => 'no-subset',
        'section'     => 'customization'
      ),
      array(
        'label'       => 'Title Typography',
        'id'          => 'title_type',
        'type'        => 'typography',
        'desc'        => 'Font Settings for the titles',
        'section'     => 'customization'
      ),
      array(
        'label'       => 'Body Text Typography',
        'id'          => 'body_type',
        'type'        => 'typography',
        'desc'        => 'Font Settings for general body font',
        'section'     => 'customization'
      ),
      array(
        'id'          => 'cust_tab2',
        'label'       => 'Backgrounds',
        'type'        => 'tab',
        'section'     => 'customization'
      ),
      array(
        'label'       => 'Header Background',
        'id'          => 'header_bg',
        'type'        => 'background',
        'desc'        => 'Background settings for the header.',
        'section'     => 'customization'
      ),
      array(
        'label'       => 'Footer Background',
        'id'          => 'footer_bg',
        'type'        => 'background',
        'desc'        => 'Background settings for the footer.',
        'section'     => 'customization'
      ),
      array(
        'label'       => 'Sub-Footer Background',
        'id'          => 'subfooter_bg',
        'type'        => 'background',
        'desc'        => 'Background settings for the sub-footer.',
        'section'     => 'customization'
      ),
      array(
        'id'          => 'footer_tab0',
        'label'       => 'General',
        'type'        => 'tab',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Display Footer',
        'id'          => 'footer',
        'type'        => 'radio',
        'desc'        => 'Would you like to display the Footer?',
        'choices'     => array(
          array(
            'label'       => 'Yes',
            'value'       => 'yes'
          ),
          array(
            'label'       => 'No',
            'value'       => 'no'
          )
        ),
        'std'         => 'yes',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Display Sub - Footer',
        'id'          => 'subfooter',
        'type'        => 'radio',
        'desc'        => 'Would you like to display the Sub-Footer?',
        'choices'     => array(
          array(
            'label'       => 'Yes',
            'value'       => 'yes'
          ),
          array(
            'label'       => 'No',
            'value'       => 'no'
          )
        ),
        'std'         => 'yes',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Footer Style',
        'id'          => 'footer_style',
        'type'        => 'radio',
        'desc'        => 'Which header style would you like to use?',
        'choices'     => array(
          array(
            'label'       => 'Style 1',
            'value'       => 'style1'
          ),
          array(
            'label'       => 'Style 2',
            'value'       => 'style2'
          )
        ),
        'std'         => 'style1',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Footer Columns',
        'id'          => 'footer_columns',
        'type'        => 'radio-image',
        'desc'        => 'You can change the layout of footer columns here',
        'std'         => 'fivecolumns',
        'section'     => 'footer'
      ),
      array(
        'id'          => 'footer_tab1',
        'label'       => 'Footer Icons',
        'type'        => 'tab',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Visa',
        'id'          => 'payment_visa',
        'type'        => 'on_off',
        'desc'        => 'Would you like to display Visa logo?',
        'section'     => 'footer',
        'std'         => 'on'
      ),
      array(
        'label'       => 'MasterCard',
        'id'          => 'payment_mc',
        'type'        => 'on_off',
        'desc'        => 'Would you like to display MasterCard logo?',
        'section'     => 'footer',
        'std'         => 'on'
      ),
      array(
        'label'       => 'PayPal',
        'id'          => 'payment_pp',
        'type'        => 'on_off',
        'desc'        => 'Would you like to display PayPal logo?',
        'section'     => 'footer',
        'std'         => 'on'
      ),
      array(
        'label'       => 'Discover',
        'id'          => 'payment_discover',
        'type'        => 'on_off',
        'desc'        => 'Would you like to display Discover logo?',
        'section'     => 'footer',
        'std'         => 'on'
      ),
      array(
        'label'       => 'Amazon Payments',
        'id'          => 'payment_amazon',
        'type'        => 'on_off',
        'desc'        => 'Would you like to display Amazon Payments logo?',
        'section'     => 'footer',
        'std'         => 'on'
      ),
      array(
        'label'       => 'Stripe',
        'id'          => 'payment_stripe',
        'type'        => 'on_off',
        'desc'        => 'Would you like to display Stripe logo?',
        'section'     => 'footer',
        'std'         => 'on'
      ),
      array(
        'label'       => 'American Express',
        'id'          => 'payment_amex',
        'type'        => 'on_off',
        'desc'        => 'Would you like to display American Express logo?',
        'section'     => 'footer',
        'std'         => 'on'
      ),
      array(
        'label'       => 'Google Maps API Key',
        'id'          => 'map_api_key',
        'type'        => 'text',
        'desc'        => 'Please enter the Google Maps Api Key. <small>You need to create a browser API key. For more information, please visit: <a href="https://developers.google.com/maps/documentation/javascript/get-api-key">https://developers.google.com/maps/documentation/javascript/get-api-key</a></small>',
        'section'     => 'contact'
      ),
		  array(
		  	'label'       => 'Map Zoom Amount',
		    'id'          => 'contact_zoom',
		    'desc'        => 'Value should be between 1-18, 1 being the entire earth and 18 being right at street level. <small>You can get lat-long coordinates using <a href="http://www.latlong.net/convert-address-to-lat-long.html" target="_blank">Latlong.net</a></small>',
		    'std'         => '17',
		    'type'        => 'numeric-slider',
		    'section'     => 'contact',
		    'min_max_step'=> '1,18,1'
		  ),
		  array(
		    'label'       => 'Map Center Latitude',
		    'id'          => 'map_center_lat',
		    'type'        => 'text',
		    'desc'        => 'Please enter the latitude for the maps center point. <small>You can get lat-long coordinates using <a href="http://www.latlong.net/convert-address-to-lat-long.html" target="_blank">Latlong.net</a></small>',
		    'section'     => 'contact'
		  ),
		  array(
		    'label'       => 'Map Center Longtitude',
		    'id'          => 'map_center_long',
		    'type'        => 'text',
		    'desc'        => 'Please enter the longitude for the maps center point.',
		    'section'     => 'contact'
		  ),
		  array(
		    'label'       => 'Map Infowindow Text',
		    'id'          => 'map_pin_info',
		    'type'        => 'text',
		    'desc'        => 'If you would like to display any text in an info window for your pin, please enter it here.',
		    'section'     => 'contact'
		  ),
		  array(
		    'label'       => 'Map Pin Image',
		    'id'          => 'map_pin_image',
		    'type'        => 'upload',
		    'desc'        => 'If you would like to use your own pin, you can upload it here',
		    'section'     => 'contact'
		  ),
		  
    )
  );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
  // Add Revolution Slider select option
  function add_revslider_select_type( $array ) {

    $array['revslider-select'] = 'Revolution Slider Select';
    return $array;

  }
  add_filter( 'ot_option_types_array', 'add_revslider_select_type' ); 

  // Show RevolutionSlider select option
  function ot_type_revslider_select( $args = array() ) {
    extract( $args );
    $has_desc = $field_desc ? true : false;
    echo '<div class="format-setting type-revslider-select ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';
    echo $has_desc ? '<div class="description">' . htmlspecialchars_decode( $field_desc ) . '</div>' : '';
      echo '<div class="format-setting-inner">';
      // Add This only if RevSlider is Activated
      if ( class_exists( 'RevSliderAdmin' ) ) {
        echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="option-tree-ui-select ' . $field_class . '">';

        /* get revolution array */
        $slider = new RevSlider();
        $arrSliders = $slider->getArrSlidersShort();

        /* has slides */
        if ( ! empty( $arrSliders ) ) {
          echo '<option value="">-- ' . __( 'Choose One', 'option-tree' ) . ' --</option>';
          foreach ( $arrSliders as $rev_id => $rev_slider ) {
            echo '<option value="' . esc_attr( $rev_id ) . '"' . selected( $field_value, $rev_id, false ) . '>' . esc_attr( $rev_slider ) . '</option>';
          }
        } else {
          echo '<option value="">' . __( 'No Sliders Found', 'option-tree' ) . '</option>';
        }
        echo '</select>';
      } else {
          echo '<span style="color: red;">' . __( 'Sorry! Revolution Slider is not Installed or Activated', 'ventus' ). '</span>';
      }
      echo '</div>';
    echo '</div>';
  }
}