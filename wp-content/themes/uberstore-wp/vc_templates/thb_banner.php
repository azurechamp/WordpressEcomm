<?php function thb_banner( $atts, $content = null ) {
  $atts = vc_map_get_attributes( 'thb_banner', $atts );
  extract( $atts );
	
	$out = $parallax = $data = '';
	if ( $enable_parallax ) {
		if ( $parallax_speed == '' ) {
			$parallax_speed = 1;
		}
	
		$parallax = 'parallax_bg';
		$data = ' data-parallax-speed="' . $parallax_speed . '"';
	}
	
	$img_id = preg_replace('/[^\d]/', '', $banner_bg);
	$img = wp_get_attachment_image_src($img_id, 'full');
	
  $out .= '<aside class="banner '.esc_attr($alignment.' '.$type.' '.$parallax).'" style="border-color:'.esc_attr($banner_border_color).'; min-height:'.esc_attr($banner_height).'px; background: '.esc_attr($banner_color).' url('.esc_attr($img[0]).'); padding:'.esc_attr($banner_padding).'px;" '.esc_attr($data).'>
  	<div class="divcontent">'.($type != 'type3' ? shortcode_unautop(do_shortcode($content)) : '').'</div>';
  	$out .= '<div class="divstyle" style="border-color:'.$banner_border_color.';">';
  	
		  if( $type == 'type3') {
		  	$out .= '<a href="'.esc_url($button_link).'" class="btn large white" title="'.esc_attr($button_text).'">'.$button_text.'</a>';
		  	$out .= '<h3>'.$title.'</h3>';
		  	$out .= '<p>'.$subtitle.'</p>';
		  }

  	$out .= '</div>';
  	if( $type == 'type5') {
  		$out .= '<a href="'.esc_url($overlay_link).'" class="overlay_link"></a>';
  	}
  $out .= '</aside>';
  return $out;
}
add_shortcode('thb_banner', 'thb_banner');
