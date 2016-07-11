<?php namespace CesarHdz\ColorList;

class Shortcode{

	protected $content;

	const DEFAULT_TAG = 'span';
	const DEFAULT_ATTR = 'data-color';
	const DEFAULT_DELIMITER = ',';

	function __construct($content, $atts){
		$this->content = $content;
		$this->atts = $atts ? $atts : array();
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

	static $template = '<{tag} class="{attr_class}" {attr}="{attr_value}" title="{value}"><span>{value}</span></{tag}>';
	
	static $templatePatterns = array(
		'{tag}', 
		'{attr}', 
		'{value}', 
		'{attr_value}',
		'{attr_class}'
	);

	function itemToTemplate($item){
		// Eliminamos espacios en blanco en los elementos
		$item = trim($item);

		$replacement = array(
			self::DEFAULT_TAG,
			self::DEFAULT_ATTR,
			$item,
			$this->getPrefix() . self::sanitizeItem($item),
			$this->getClassName()
		);

		return str_replace(self::$templatePatterns, $replacement, self::$template);
	}

	function getPrefix(){
		$key = 'prefix';
		return array_key_exists($key, $this->atts) ? $this->atts[$key] . '-' : '';
	}

	function getClassName(){
		$key = 'class';
		return array_key_exists($key, $this->atts) ? $this->atts[$key] : '';
	}

	static function sanitizeItem($item){
		//@TODO Hacerlo a través de otra dependencia
		$item = sanitize_title_with_dashes($item);

		return $item;
	}

	/**
	 * Run
	 * @param  array $atts    Atributos agregados al shorcode
	 * @param  string $content Cotnenido del shorcode
	 * @return mixed          Usualmente regresa un String;
	 */
	static function run($atts, $content){
		$shortcode = new Shortcode($content, $atts);

		return $shortcode->parse();
	}
}