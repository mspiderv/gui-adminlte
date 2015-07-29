<?php 

return [

	/*
    |--------------------------------------------------------------------------
    | Window Skin
    |--------------------------------------------------------------------------
    |
    | Supported: "blue", "blue-light",
    | 			 "yellow", "yellow-light",
    | 			 "green", "green-light",
    | 			 "purple", "purple-light",
    | 			 "red", "red-light",
    | 			 "black", "black-light"
    |
    */

	'skin' => 'blue',

	/*
    |--------------------------------------------------------------------------
    | Window Layout
    |--------------------------------------------------------------------------
    |
    | Supported: "", "fixed", "layout-boxed"
    |
    */

	'layout' => '',

	/*
    |--------------------------------------------------------------------------
    | Should be sidebar collapsed by default ?
    |--------------------------------------------------------------------------
    |
    | Options: true, false
    |
    */

	'sidebarCollapsed' => false,

	/*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Set path to favicon or nothing.
    |
    */

	'favicon' => '',

	/*
    |--------------------------------------------------------------------------
    | Search Box
    |--------------------------------------------------------------------------
    |
    | name - The "name" attribute of search input.
    | method - The "method" attribute of search form.
    | action - The "action" attribute of search form.
    |
    | Note: Search box will only appear if "action" value is set.
    |
    */

	'search' => [
		'name' => 'q',
		'method' => 'GET',
		'action' => '',
	],

    /*
    |--------------------------------------------------------------------------
    | Boxes
    |--------------------------------------------------------------------------
    |
    | solid - Are boxes solid ? Options: true, false
    | collapsible - Are boxes collapsible ? Options: true, false
    |
    */

    'box' => [
        'solid' => false,
        'collapsible' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Login Background Image
    |--------------------------------------------------------------------------
    |
    */
    'loginBackgroundImage' => 'gui/custom/img/login-bg.jpg',

    /*
    |--------------------------------------------------------------------------
    | Table Row HTML
    |--------------------------------------------------------------------------
    |
    */
    'tableRowHandle' => '<i class="ion-code handle"></i>',

];