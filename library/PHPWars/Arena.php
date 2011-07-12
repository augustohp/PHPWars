<?php
namespace PHPWars;

class Arena
{
	protected $_size;
	protected $_locations;
	
	public function __construct($size = null)
	{
		if (!is_null($size)) {
			$this->setSize($size);
		}
	}
	
	public function setSize($int)
	{
		$this->_size = $int;
	}
	
	public function getSize()
	{
		return (int) $this->_size;
	}
	
	public function reset()
	{
		$size             = $this->getSize();
		$this->_locations = array();
		
		if (empty($size)) {
			throw new \RuntimeException('No size defined!');
		}
		
		for ($x=0; $x<=$size; $x++) {
			$this->_locations[$x] = array();
			for ($y=0; $y<=$size; $y++) {
				$this->_locations[$x][$y] = new Location($x, $y);
			}
		}
	}
	
	public function getLocation($x, $y)
	{
		if (!isset($this->_locations[$x])) {
			$msg = "%d is not a valid position for X";
			throw new \InvalidArgumentException($msg, $x);
		}
		if (!isset($this->_locations[$x][$y])) {
			$msg = "%d is not a valid position for Y";
			throw new \InvalidArgumentException($msg, $y);
		}
		return $this->_locations[$x][$y];
	}
}