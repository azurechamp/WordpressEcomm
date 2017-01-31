<?php function thb_header( $atts, $content = null ) {
   $atts = vc_map_get_attributes( 'thb_header', $atts );
   extract( $atts );
	
	if($is_image && $image) {  
		$img_id = preg_replace('/[^\d]/', '', $image);
		$img = wp_get_attachment_image_src($img_id, 'full');
		
		$out = '<img src="'.$img[0].'" alt="'.$title.'" />'; 
	} else {
		$icon = ($icon ? $icon : 'fa-rocket');
		$out = '<i class="fa '.$icon.'"></i>'; 
	}
	
	$out = '<aside class="styled_header">'. ($sub_title ? '<h5>'.$sub_title.'</h5>' : '').'<h6>'.$title.'</h6><span class="icon">'.$out.'</span></aside>';
  
  return $out;
}
add_shortcode('thb_header', 'thb_header');
