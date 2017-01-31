<?php

#-----------------------------------------------------------------
# Elements 
#-----------------------------------------------------------------

$thb_shortcodes['header_2'] = array( 
	'type'=>'heading', 
	'title'=>__('Elements')
);
$thb_shortcodes['small_title'] = array( 
	'type'=>'regular', 
	'title'=>__('Small Title'), 
	'attr'=>array( 
		'title'=>array(
			'type'=>'text', 
			'title'=>'Title'
		)
	)
);
$thb_shortcodes['large_title'] = array( 
	'type'=>'regular', 
	'title'=>__('Large Title'), 
	'attr'=>array( 
		'title'=>array(
			'type'=>'text', 
			'title'=>'Title'
		),
		'center'=> array(
			'type'=>'checkbox', 
			'title'=>__('Center?'),
			'desc'=>'Center the title?'
		)
	)
);
$thb_shortcodes['thb_button'] = array( 
	'type'=>'regular', 
	'title'=>__('Button', 'uberstore' ), 
	'attr'=>array(
		'size'=>array(
			'type'=>'radio', 
			'title'=>__('Size', 'uberstore'),
			'opt'=>array(
				'small'=>'Small',
				'medium'=>'Medium',
				'large'=>'Large'
			)
		),
		'color'=>array(
			'type'=>'radio', 
			'title'=>__('Color', 'uberstore'),
			'opt'=>array(
				'white' => 'White',
				'grey' => 'Light Grey',
				'black' => 'Black',
				'blue' => 'Blue',
				'green' => 'Green',
				'yellow' => 'Yellow',
				'orange' => 'Orange',
				'pink' => 'Pink',
				'petrol' => 'Petrol Green',
				'darkgrey' => 'Gray'
			)
		),
		'animation'=>array(
			'type'=>'radio', 
			'title'=>__('Animation', 'uberstore'),
			'opt'=>array(
				"" => "None",
				"animation right-to-left" => "Left",
				"animation left-to-right" => "Right",
				"animation bottom-to-top" => "Top",
				"animation top-to-bottom" => "Bottom",
				"animation scale" => "Scale",
				"animation fade-in" => "Fade"
			)
		),
		'icon'=>array(
			'type'=>'text', 
			'title'=>__('Icon', 'uberstore')
		),
		'title'=>array(
			'type'=>'text', 
			'title'=>__('Buton Text', 'uberstore')
		),
		'link'=>array(
			'type'=>'text', 
			'title'=>__('Buton Link', 'uberstore')
		),
		'blank'=> array(
			'type'=>'checkbox', 
			'title'=>__('Open in new window?', 'uberstore'),
			'desc'=>'Enable this to open link in new window'
		)
	)
);
$thb_shortcodes['quote'] = array( 
	'type'=>'regular', 
	'title'=>__('Quotes'), 
	'attr'=>array( 
		'align'=>array(
			'type'=>'radio', 
			'title'=>__('Alignment'), 
			'opt'=>array(
				'normal'=>'Normal',
				'pullleft'=>'Pull Left',
				'pullright'=>'Pull Right'
			)
		),
		'content'=>array(
			'type'=>'textarea', 
			'title'=>__('Content')
		),
		'author'=>array(
			'type'=>'text', 
			'title'=>'Quote Author'
		)
		
	)
);
$thb_shortcodes['tags'] = array( 
	'type'=>'regular', 
	'title'=>__('Tags', 'uberstore' ), 
	'attr'=>array(
		'color'=>array(
			'type'=>'radio', 
			'title'=>__('Color', 'uberstore'),
			'opt'=>array(
				'black'=>'Black',
				'red'=>'Red',
				'blue'=>'Blue',
				'green'=>'Green',
				'grey'=>'Grey',
				'yellow'=>'Yellow'
			)
		),
		'text'=>array(
			'type'=>'text', 
			'title'=>__('Text', 'uberstore')
		)
	)
);
$thb_shortcodes['dropcap'] = array( 
	'type'=>'regular', 
	'title'=>__('Dropcap', 'uberstore' ),
	'attr'=>array( 
		'boxed'=> array(
			'type'=>'checkbox', 
			'title'=>__('Boxed?', 'uberstore' ),
			'desc'=>'Makes the dropcap boxed'
		)
	)
);

$thb_shortcodes['single_icon'] = array( 
	'type'=>'regular', 
	'title'=>__('Single Icon'), 
	'attr'=>array( 
		'icon'=>array(
			'type'=>'select', 
			'title'=>__('Icon'),
			'values'=> thb_getIconArray()
		),
		'size'=>array(
			'type'=>'radio', 
			'title'=>__('Icon Size'),
			'opt'=>array(
				'icon-1x'=>'1x',
				'icon-2x'=>'2x',
				'icon-3x'=>'3x',
				'icon-4x'=>'4x'
			)
		),
		'boxed'=> array(
			'type'=>'checkbox', 
			'title'=>__('Boxed?'),
			'desc'=>'Boxed contains the icon inside a box'
		),
		'icon_link'=>array(
			'type'=>'text', 
			'title'=>__('Icon Link'),
			'desc'=>'If you would like to link the icon to an url, enter it here. (Boxed option should be checked)'
		)
	)
);
?>