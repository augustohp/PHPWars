<?php

namespace PHPWars\Test;

use PHPWars\Arena,
    PHPWars\PHPUnit\TestCase;

class ArenaTest extends TestCase
{

    /**
     * @var Arena
     */
    protected $object;

    protected function setUp() 
	{
        $this->object = new Arena;
    }

    protected function tearDown() 
	{

    }

    /**
     * @dataProvider PHPWars\PHPUnit\DataProvider::validIntForPlane
     */
    public function testSetSize($int) 
	{
        $this->object->setSize($int);
		$this->assertAttributeEquals($int, '_size', $this->object);
    }
	
	public function testSetSizeOnConstructor()
	{
		$this->object = new Arena(5);
		$this->assertAttributeEquals(5, '_size', $this->object);
	}

    /**
     * @depends testSetSize
	 * @dataProvider PHPWars\PHPUnit\DataProvider::validIntForPlane
     */
    public function testGetSize($int)
	{
		$this->object->setSize($int);
		$this->assertEquals($int, $this->object->getSize());
    }
	
	public function testResetException()
	{
		$this->setExpectedException('RuntimeException');
		$this->object->reset();
	}

    /**
	 * @depends testGetSize
     * @dataProvider PHPWars\PHPUnit\DataProvider::validIntForPlane
     */
    public function testReset($int) 
	{
        $this->object->setSize($int);
		$this->assertAttributeEmpty('_locations', $this->object);
		$this->object->reset();
		$this->assertAttributeInternalType('array', '_locations', $this->object);
    }

    /**
	 * @depends testReset
	 */
    public function testGetLocation() 
	{
        $this->object->setSize(5);
		$this->object->reset();
		$location = $this->object->getLocation(4, 4);
		$this->assertInstanceOf('PHPwars\Content\Tile', $location);
    }
	
	public function testGetLocationResetException()
	{
		$this->setExpectedException('RuntimeException');
		$this->object->setSize(5);
		$this->object->getLocation(1, 1);
	}
	
	public function testGetLocationXException()
	{
		$this->setExpectedException('InvalidArgumentException');
		$this->object->setSize(5);
		$this->object->reset();
		$this->object->getLocation(5, 5);
	}
	
	public function testGetLocationYException()
	{
		$this->setExpectedException('InvalidArgumentException');
		$this->object->setSize(5);
		$this->object->reset();
		$this->object->getLocation(4, 5);
	}

}
