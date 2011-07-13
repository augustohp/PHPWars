<?php
/**
 * @namespace
 */
namespace PHPWars\Content;
use PHPWars\Piece\Placeable,
    PHPwars\Content\Contenteable;

/**
 * A tile is the most basic unit (place) of a arena.
 * 
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
	 * @var type 
	 */
	protected $_content;
	
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
	 * @param Placeable $mixed
	 * @return Tile 
	 */
	public function setContent(Placeable $mixed)
	{
		$this->_content = $mixed;
		return $this;
	}
	
	/**
	 * @inheritdoc
	 */
	public function hasContent()
	{
		return !is_null($this->_content);
	}
	
	/**
	 * @inheritdoc
	 * @todo Implement Content collection
	 */
	public function getContent()
	{
		return $this->_content;
	}
	
	/**
	 * @injeritdoc
	 * @todo Do thid thing right. See for the size of the pieces here.
	 */
	public function canMoveHere()
	{
		return !$this->hasContent();
	}
	
	/**
	 * @inheritdoc
	 */
	public function getSize()
	{
		return 1;
	}
}