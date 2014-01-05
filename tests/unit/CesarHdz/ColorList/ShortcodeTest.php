<?php
namespace CesarHdz\ColorList;

class ShortcodeTest extends \PHPUnit_Framework_TestCase
{
    public function testShortcodeRunExists(){
    	$sample = 'sample';
    	$result =  Shortcode::run(array(), $sample);


    	$this->assertTrue( strpos($sample, $result) != -1);
    }


    public function testCreaUnaLista(){

    	$sample = load_sample('basic');
    	$result = $this->parse($sample);

    	$this->assertStringStartsWith('<ul>', $result);
    	$this->assertStringEndsWith('</ul>', $result);
    }


    function parse($content){
    	$shorcode = new Shortcode($content);
    	return $shorcode->parse();
    }
}
