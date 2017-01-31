<?php
function thb_ShortenText($text, $chars_limit)
	{
	$text = strip_tags($text);
	$text = strip_shortcodes( $text );
	
	$chars_text = strlen($text);
	$text = $text." ";
	$text = substr($text,0,$chars_limit);
	$text = substr($text,0,strrpos($text,' '));
	
	if ($chars_text > $chars_limit) {
		$text = $text."...";
	}
	$text = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $text);
	return $text;
}