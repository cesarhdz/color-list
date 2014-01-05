<?php
namespace CesarHdz\ColorList;

class ShortcodeTest extends \PHPUnit_Framework_TestCase
{
    public function testShortcodeRunExists()
    {
    	$sample = 'sample';
    	$result =  Shortcode::run(array(), $sample);


    	$this->assertTrue( strpos($sample, $result) != -1);
    }
}
