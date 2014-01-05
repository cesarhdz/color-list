<?php namespace CesarHdz\ColorList;

class Shortcode{


	protected $content;

	const DEFAULT_TAG = 'span';
	const DEFAULT_ATTR = 'data-color';
	const DEFAULT_DELIMITER = ',';

	function __construct($content){
		$this->content = $content;
	}

	function parse(){
		// Como devulve una lista, la estructura será ul > li + li ....
		$items = explode(self::DEFAULT_DELIMITER, $this->getContent());

		return $this->parseItems($items);
	}


	function getContent(){
		return str_replace(array("\r\n", "\r", "\n"), "", $this->content);
	}


	function parseItems(array $items){
		$result = array_map(array($this, 'itemToTemplate'), $items);

		return implode('', $result);
	}

	static $template = '<{tag} {attr}="{attr_value}">{value}</{tag}>';
	static $templatePatterns = array('{tag}', '{attr}', '{value}', '{attr_value}');

	function itemToTemplate($item){

		// Eliminamos espacios en blanco en los elementos
		$item = trim($item);

		$replacement = array(
			self::DEFAULT_TAG,
			self::DEFAULT_ATTR,
			$item,
			self::sanitizeItem($item)
		);

		return str_replace(self::$templatePatterns, $replacement, self::$template);
	}


	static function sanitizeItem($item){
		$item = strtolower($item);

		return $item;
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