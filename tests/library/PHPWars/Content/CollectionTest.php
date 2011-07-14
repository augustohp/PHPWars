<?php

namespace PHPWars\Test;
use PHPWars\PHPUnit\TestCase,
	PHPWars\Content\Collection,
	PHPWars\Piece\Wall;

class CollectionTest extends TestCase 
{

	/**
	 * @var Collection
	 */
	protected $object;

	protected function setUp() 
	{
		$this->object = new Collection;
	}

	protected function tearDown() 
	{
		
	}
	
	/**
	 * @dataProvider PHPWars\PHPUnit\DataProvider::validSizes
	 */
	public function testSetSize($int)
	{
		$this->object->setSize($int);
		$this->assertAttributeEquals($int, '_validSize', $this->object);
	}
	
	/**
	 * @depends testSetSize
	 * @dataProvider PHPWars\PHPUnit\DataProvider::validSizes
	 */
	public function testGetSize($int)
	{
		$this->object->setSize($int);
		$this->assertEquals($int, $this->object->getSize());
	}

	/**
	 * @depends testGetSize
	 */
	public function testAppend() 
	{
		$wall = new Wall();
		$size = $wall->getSize();
		
		$this->object->setSize($size);
		$this->assertAttributeEquals(array(), '_contents', $this->object);
		$this->object->append($wall);
		$this->assertAttributeContains($wall, '_contents', $this->object);
		return $this->object;
	}
	
	/**
	 * @depends testAppend
	 */
	public function testInvalidAppend()
	{
		$this->setExpectedException('InvalidArgumentException');
		
		$wall = $this->getMock('PHPWars\Piece\Wall', array('getSize'));
		$wall->expects($this->once())
		     ->method('getSize')
			 ->will($this->returnValue(2));
		
		$this->object->setSize(1);
		$this->object->append($wall);
	}

	/**
	 * @depends testAppend
	 */
	public function testCount($object) 
	{
		$this->assertEquals(1, count($object));
		return $object;
	}
	
	/**
	 * @depends testCount
	 */
	public function testIterator($object)
	{
		foreach ($object as $tile) {
			$this->assertInstanceOf('PHPWars\Piece\Placeable', $tile);
		}
	}

}
