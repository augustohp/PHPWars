<?php

namespace PHPWars\Test;

use PHPWars\Piece\Wall,
	PHPWars\Piece\AbstractPiece,
	PHPWars\PHPUnit\TestCase;

class WallTest extends TestCase 
{

	/**
	 * @var Wall
	 */
	protected $object;

	
	protected function setUp() 
	{
		$this->object = new Wall;
	}

	protected function tearDown() 
	{
		
	}

	public function testGetSize() 
	{
		$this->assertEquals(1, $this->object->getSize());
	}

	/**
	 * @dataProvider PHPwars\PHPunit\DataProvider::validIntForPlane
	 */
	public function testSetX($int)
	{
		$this->object->setX($int);
		$this->assertAttributeEquals($int, '_x', $this->object);
	}
	
	/**
	 * @depends testSetX
	 */
	public function testGetX()
	{
		$this->object->setX(1);
		$this->assertEquals(1, $this->object->getX());
	}
	
	public function testGetXException()
	{
		$this->setExpectedException('UnexpectedValueException');
		$this->object->getX();
	}
	
	/**
	 * @dataProvider PHPwars\PHPunit\DataProvider::validIntForPlane
	 */
	public function testSetY($int)
	{
		$this->object->setY($int);
		$this->assertAttributeEquals($int, '_y', $this->object);
	}
	
	/**
	 * @depends testSetY
	 */
	public function testGetY()
	{
		$this->object->setY(1);
		$this->assertEquals(1, $this->object->getY());
	}
	
	public function testGetYException()
	{
		$this->setExpectedException('UnexpectedValueException');
		$this->object->getY();
	}
}
