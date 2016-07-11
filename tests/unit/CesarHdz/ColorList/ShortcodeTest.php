<?php
namespace CesarHdz\ColorList;

class ShortcodeTest extends \PHPUnit_Framework_TestCase
{
    public function testShortcodeRunExists(){
    	$sample = 'sample';
    	$result =  Shortcode::run(array(), $sample);

    	$this->assertTrue( strpos($sample, $result) != -1);
    }


    public function testLaListaTieneUnaEstructuraAdecuada(){
    	$sample = load_sample('basic');
    	$expected = load_sample('basic-expected');
    	
    	$result = $this->parse($sample, []);

    	$this->assertEquals($expected, $result);
    }


    function parse($content, $atts){
    	$shorcode = new Shortcode($content, $atts);
    	return $shorcode->parse();
    }
}