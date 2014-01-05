<?php
/*
Plugin Name: Color-list
Version: 0.1-alpha
Description: Includes a shortcode to convert a list in colors
Author: Cesar Hernandez
Author URI: http://cesarhdz.com 
*/

// Utilizamos autoload si esta disponible
$composer_autoload = dirname(__FILE__) . '/vendor/autoload.php';

if(is_readable($composer_autoload))	require $composer_autoload;


// La unica funcion registra el shortcode
add_shortcode('color-list', array('CesarHdz\ColorList\Shortcode', 'run'));




