<?php namespace CesarHdz\ColorList;

class Shortcode{


	protected $content;

	
	function __construct($content){
		$this->content = $content;
	}


	function parse(){
		// Como devulve una lista, la estructura será ul > li + li ....
		$result = '<ul>' . $this->content . '</ul>';

		return $result;
	}


	/**
	 * Run
	 * @param  array $atts    Atributos agregados al shorcode
	 * @param  string $content Cotnenido del shorcode
	 * @return mixed          Usualmente regresa un String;
	 */
	static function run($atts, $content){
		$shortcode = new Shortcode($content);

		return $shortcode->parse();
	}
}