<?php
/**
 * @namespace
 */
namespace PHPWars\Content;

use PHPWars\Piece\Placeable,
    PHPWars\Content\Contenteable,
	PHPWars\Content\Collection;

/**
 * A tile is the most basic unit (place) of a arena.
 * 
 * @todo	Write validation to setX() and setY() methods
 * @package PHPWars/Content
 * @since	0.0.1
 * @author	Augusto Pascutti <augusto@phpsp.org.br>
 */
class Tile implements Contenteable
{
	/**
	 * X location of this tile in the arena.
	 *
	 * @var int
	 */
	protected $_x;
	
	/**
	 * Y location of this tile in the arena.
	 *
	 * @var int
	 */
	protected $_y;
	
	/**
	 * Content of this tile.
	 *
	 * @var Collection 
	 */
	private $_content;
	
	/**
	 * Constructor.
	 *
	 * @param int $x
	 * @param int $y 
	 */
	public function __construct($x = null, $y = null)
	{
		if (!is_null($x)) {
			$this->setX($x);
		}
		if (!is_null($y)) {
			$this->setY($y);
		}
		$this->reset();
	}
	
	/**
	 * Defines the X place in the arena of this tile.
	 *
	 * @param int $int
	 * @return Tile 
	 */
	public function setX($int)
	{
		$this->_x = (int) $int;
		return $this;
	}
	
	/**
	 * @inheritdoc
	 */
	public function getX()
	{
		if (empty($this->_x)) {
			throw new \UnexpectedValueException("X not set for Tile");
		}
		return (int) $this->_x;
	}
	
	/**
	 * Defines the Y place in the arena of this tile.
	 *
	 * @param int $int
	 * @return Tile 
	 */
	public function setY($int)
	{
		$this->_y = (int) $int;
		return $this;
	}
	
	/**
	 * @inheritdoc
	 */
	public function getY()
	{
		if (empty($this->_y)) {
			throw new \UnexpectedValueException("Y not set for Tile");
		}
		return (int) $this->_y;
	}
	
	/**
	 * Defines the content of this tile.
	 *
	 * @throws	InvalidArgumentException	Size of collection exceeded
	 * @param	Placeable $mixed
	 * @return	Tile 
	 */
	public function addContent(Placeable $mixed)
	{
		if (!$this->canMoveHere($mixed)) {
			$msg = 'Maximum size of this collection exceeded.';
			throw new \InvalidArgumentException($msg);
		}
		$this->getContent()->append($mixed);
		return $this;
	}
	
	/**
	 * @inheritdoc
	 */
	public function hasContent(Placeable $object = null)
	{
		return ($this->getContent()->count() > 0);
	}
	
	/**
	 * @inheritdoc
	 */
	public function getContent()
	{
		if (!$this->_content instanceof Collection) {
			$msg = 'Collection must be reset before used.';
			throw new \UnexpectedValueException($msg);
		}
		return $this->_content;
	}
	
	/**
	 * @inheritdoc
	 */
	public function canMoveHere(Placeable $object)
	{
		return $this->getContent()->canAppend($object);
	}
	
	/**
	 * @inheritdoc
	 */
	public function getSize()
	{
		return 1;
	}
	
	/**
	 * Resets the content of this tile.
	 */
	public function reset()
	{
		$this->_content = new Collection($this->getSize());
	}
}