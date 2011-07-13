<?php

namespace PHPWars\Test;

use PHPWars\PHPUnit\TestCase,
	PHPWars\Content\Tile,
	PHPWars\Piece\Wall;

class TileTest extends TestCase 
{

	/**
	 * @var Tile
	 */
	protected $object;

	protected function setUp() 
	{
		$this->object = new Tile;
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

	/**
	 * @dataProvider PHPWars\PHPUnit\DataProvider::validPieces
	 */
	public function testSetContent($piece) 
	{
		$this->object->setContent($piece);
		$this->assertAttributeEquals($piece, '_content', $this->object);
	}

	/**
	 * @depends testSetContent
	 * @dataProvider PHPWars\PHPUnit\DataProvider::validPieces
	 */
	public function testHasContent($piece) 
	{
		$this->assertFalse($this->object->hasContent());
		$this->object->setContent($piece);
		$this->assertTrue($this->object->hasContent());
	}

	/**
	 * @depends testHasContent
	 * @dataProvider PHPWars\PHPUnit\DataProvider::validPieces
	 */
	public function testGetContent($piece) 
	{
		$this->object->setContent($piece);
		$this->assertEquals($piece, $this->object->getContent());
	}

	/**
	 * @depends testHasContent
	 */
	public function testCanMoveHere() 
	{
		$this->assertTrue($this->object->canMoveHere());
		$this->object->setContent(new Wall());
		$this->assertFalse($this->object->canMoveHere());
	}
}
