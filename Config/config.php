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
    | Path to favicon.
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
    | Tables Configuration
    |--------------------------------------------------------------------------
    |
    */
    'table' => [

        /*
        |--------------------------------------------------------------------------
        | Table Row HTML
        |--------------------------------------------------------------------------
        |
        */
        'rowHandle' => '<i class="ion-code handle"></i>',

        /*
        |--------------------------------------------------------------------------
        | Table Row Level Icon HTML
        |--------------------------------------------------------------------------
        | It should contain class 'pre'.
        |
        */
        'rowLevel' => '<i class="pre fa fa-angle-right"></i>',

        /*
        |--------------------------------------------------------------------------
        | Table Paging Default Value
        |--------------------------------------------------------------------------
        |
        */
        'paging' => true,

        /*
        |--------------------------------------------------------------------------
        | URL to Sorting Handler
        |--------------------------------------------------------------------------
        |
        */
        'sortURL' => '',

    ],

    /*
    |--------------------------------------------------------------------------
    | Pull Tabs Right
    |--------------------------------------------------------------------------
    |
    */
   'tabsPullRight' => false,

    /*
    |--------------------------------------------------------------------------
    | Default Alert Icons
    |--------------------------------------------------------------------------
    |
    */
    'alertIcon' => [

        /*
        |--------------------------------------------------------------------------
        | Default Alert Icon
        |--------------------------------------------------------------------------
        |
        */
        'default' => null,

        /*
        |--------------------------------------------------------------------------
        | Default Danger Alert Icon
        |--------------------------------------------------------------------------
        |
        */
        'danger' => 'fa fa-ban',

        /*
        |--------------------------------------------------------------------------
        | Default Info Alert Icon
        |--------------------------------------------------------------------------
        |
        */
        'info' => 'fa fa-info',

        /*
        |--------------------------------------------------------------------------
        | Default Success Alert Icon
        |--------------------------------------------------------------------------
        |
        */
        'success' => 'fa fa-check',

        /*
        |--------------------------------------------------------------------------
        | Default Warning Alert Icon
        |--------------------------------------------------------------------------
        |
        */
        'warning' => 'fa fa-warning',

    ],

];