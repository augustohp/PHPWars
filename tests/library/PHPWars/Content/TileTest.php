<?php

namespace PHPWars\Test;

use PHPWars\PHPUnit\TestCase,
	PHPWars\Content\Tile,
	PHPWars\Piece\Wall,
	PHPWars\Content\Collection;

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
	 * @depends testGetSize
	 */
	public function testCanMoveHere() 
	{
		$wall = $this->getMock('PHPWars\Piece\Wall');
		$wall->expects($this->exactly(5))
			 ->method('getSize')
			 ->will($this->returnValue($this->object->getSize()));
		
		$this->assertTrue($this->object->canMoveHere($wall));
		$this->object->addContent($wall);
		$this->assertFalse($this->object->canMoveHere($wall));
	}

	/**
	 * @dataProvider PHPWars\PHPUnit\DataProvider::validPieces
	 */
	public function testAddMockContent($piece) 
	{
		$object = $this->getMock('PHPWars\Content\Tile', array('getContent'));
		$object->expects($this->exactly(2))
			   ->method('getContent')
			   ->will($this->returnValue(new Collection($piece->getSize())));
		
		$object->addContent($piece);
	}
	
	/**
	 * @depends testAddMockContent
	 * @dataProvider PHPWars\PHPUnit\DataProvider::validPieces
	 */
	public function testAddContent($piece)
	{
		if (!$this->object->canMoveHere($piece)) {
			$this->markTestSkipped('Piece uses more space then allowed.');
		}
		$this->object->addContent($piece);
		$this->assertAttributeContains($piece, '_content', $this->object);
	}

	/**
	 * @depends testAddContent
	 * @dataProvider PHPWars\PHPUnit\DataProvider::validPieces
	 */
	public function testHasContent($piece) 
	{
		if (!$this->object->canMoveHere($piece)) {
			$this->markTestSkipped('Piece uses more space then allowed.');
		}
		$this->assertFalse($this->object->hasContent());
		$this->object->addContent($piece);
		$this->assertTrue($this->object->hasContent());
	}
	
	/**
	 * @depends testAddContent
	 * @dataProvider PHPWars\PHPUnit\DataProvider::validPieces
	 */
	public function testHasSpecificContent($piece)
	{
		if (!$this->object->canMoveHere($piece)) {
			$this->markTestSkipped('Piece uses more space then allowed.');
		}
		$this->assertFalse($this->object->hasContent($piece));
		$this->object->addContent($piece);
		$this->assertTrue($this->object->hasContent($piece));
	}

	/**
	 * @depends testHasContent
	 * @dataProvider PHPWars\PHPUnit\DataProvider::validPieces
	 */
	public function testGetContent($piece) 
	{
		if (!$this->object->canMoveHere($piece)) {
			$this->markTestSkipped('Piece uses more space then allowed.');
		}
		$this->object->addContent($piece);
		$this->assertContains($piece, $this->object->getContent());
	}
}
