<?php function thb_notification( $atts, $content = null ) {
  $atts = vc_map_get_attributes( 'thb_notification', $atts );
  extract( $atts );
	$btn = '';

	// Content
	$out = '<aside class="notification-box '.$type.' animation top-to-bottom"><div class="icon"></div><div class="content">'.$content.'</div><a href="#" class="close"></a></aside>';
  return $out;
}
add_shortcode('thb_notification', 'thb_notification');
