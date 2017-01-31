<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 */
 
$output = $data = $parallax = $video = $height = $parallax_class = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'wpb_composer_front_js' );
$el_class = $this->getExtraClass($el_class);


$nopadding = $column_padding ? 'no-padding ' : ''; 
$row_padding = $row_padding ? 'no-row-padding ' : ''; 
$full_width = $thb_full_width ? 'full_width ' : '';

$css_classes = array(
	'vc_row',
	'row', //deprecated
	'vc_row-fluid',
	$nopadding,
	$row_padding,
	$full_width,
	$el_class,
	vc_shortcode_custom_css_class( $css ),
);
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );

// full height
if($full_height) {
	if ($vertical_center) {
		$height = " ";
	} else {
		$height = " full-height-content";
	}
}

// equal heights
if($equal_height == 'true') {
	
	$equal_height = ' data-equal=">.columns"';
	
} else {
	$equal_height = '';
}

// video bg
$bg_video = '';
$bg_video_args = array();

if ( $bg_video_src_mp4 ) {
	$bg_video_args['mp4'] = $bg_video_src_mp4;
}

if ( $bg_video_src_ogv ) {
	$bg_video_args['ogv'] = $bg_video_src_ogv;
}

if ( $bg_video_src_webm ) {
	$bg_video_args['webm'] = $bg_video_src_webm;
}


if ( !empty($bg_video_args) ) {
	$attr_strings = array(
		'loop="1"',
		'preload="1"'
	);
	
	
	$bg_video .= sprintf( '<video %s controls="controls" class="row-video-bg" autoplay>', join( ' ', $attr_strings ) );

	$source = '<source type="%s" src="%s" />';
	foreach ( $bg_video_args as $video_type=>$video_src ) {

		$video_type = wp_check_filetype( $video_src, wp_get_mime_types() );
		$bg_video .= sprintf( $source, $video_type['type'], esc_url( $video_src ) );

	}

	$bg_video .= '</video>';
	
	if ( $bg_video_overlay_color != '' ) {
		$bg_video .= '<div class="video_overlay" style="background-color: '.$bg_video_overlay_color .';"></div>';
	}
	
	$video = ' video_bg';
}

// Parallax
if ( $enable_parallax ) {
	if ( $parallax_speed == '' ) {
		$parallax_speed = 0.2;
	}
	$parallax_class = ' parallax_bg';
	$data = ' data-stellar-background-ratio="'.$parallax_speed.'"';
}

$output .= '<div '.($el_id ? 'id="'. esc_attr( $el_id ) .'"' : '') .' class="row '.$full_width.$row_padding.$nopadding.$parallax_class.$video.$height.$el_class.vc_shortcode_custom_css_class($css, ' ').'" '.$data.$equal_height.'>';
$output .= $bg_video;
if($vertical_center && $full_height) {
	$output .= '<div class="table full-height-content"><div>';	
}
$output .= wpb_js_remove_wpautop($content);
if($vertical_center && $full_height) {
	$output .= '</div></div>';	
}
$output .= '</div>';

echo $output;