<?php
namespace PHPWars
use PHPWars\Content;

class Location
{
	protected $_x;
	protected $_y;
	protected $_content;
	
	public function __construct($x, $y)
	{
		$this->setX($x);
		$this->setY($y);
	}
	
	public function setX($int)
	{
		$this->_x = (int) $int;
		return $this;
	}
	
	public function getX()
	{
		return (int) $this->_x;
	}
	
	public function setY($int)
	{
		$this->_y = (int) $int;
		return $this;
	}
	
	public function getY()
	{
		return (int) $this->_y;
	}
	
	public function setContent(Content $mixed)
	{
		$this->_content = $mixed;
		return $this;
	}
	
	public function hasContent()
	{
		return is_null($this->_content);
	}
	
	public function getContent()
	{
		return $this->_content;
	}
}