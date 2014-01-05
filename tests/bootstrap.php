<?php

require dirname(__FILE__) . '/../vendor/autoload.php';


define('SAMPLE_DIR', dirname(__FILE__) . '/sample/');
define('SAMPLE_EXT', '.txt');

// Funcion para extraer ejemplos
function load_sample($filename){

	$path = SAMPLE_DIR . $filename . SAMPLE_EXT;

	if(is_readable($path)){
		return file_get_contents($path);
	}
}