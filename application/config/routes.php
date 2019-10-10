<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['ci_rewrite_routes'] = array(
	'home' => array(
		'url' => '/',
		'method' => 'pages/home',
		'callback' => 'callback/home'
	),
	'404_override' => array(
		'url' => '/404',
		'method' => 'pages/otherwise',
		'callback' => 'callback/otherwise'
	),
	'contact' => array(
		'url' => '/contact',
		'method' => 'pages/contact',
		'callback' => 'callback/acnsf'
	),
	'help' => array(
		'url' => '/help',
		'method' => 'pages/help',
		// 'callback' => 'callback/help'
	),
	'products' => array(
		'url' => '/products',
		'method' => 'pages/products_method',
		'callback' => 'callback/products'
	),
	'portfolio' => array(
		'url' => '/portfolio',
		'method' => 'pages/portfolio_func',
		'callback' => 'callback/portfolio'
	),
);

// $route['default_controller'] = 'pages/view';
// $route['default_controller'] = 'welcome';
$route['default_controller'] = 'pages/main';
$route['(:any)'] = 'pages/main';

// $route['callback/(:any)'] = 'pages/$1';
foreach($route['ci_rewrite_routes'] as $key => $ci_route) {
	if( @empty($ci_route['callback']) )
		$ci_route['callback'] = 'callback/' . $key;

	$route[ $ci_route['callback'] ] = $ci_route['method'];
}

// $route['about'] = 'pages/about';
// $route['contact'] = 'pages/contact';

// $route['product/(:any)'] = '$1';
//$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
