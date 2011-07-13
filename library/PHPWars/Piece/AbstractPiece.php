<?php
/**
 * @namespace
 */
namespace PHPWars\Piece;

/**
 * Base class to create pieces.
 *
 * @package     PHPWars/Piece
 * @since		0.0.1
 * @author      Augusto Pascutti <augusto@phpsp.org.br>
 */
abstract class AbstractPiece implements Placeable
{
	/**
	 * X location of this piece in the arena.
	 *
	 * @var int
	 */
	protected $_x;
	
	/**
	 * Y location of this piece in the arena.
	 *
	 * @var int
	 */
	protected $_y;
	
	/**
	 * Constructor.
	 *
	 * @param int[optional] $x
	 * @param int[optional] $y 
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
	 * Defines the X place in the arena of this piece.
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
			throw new \UnexpectedValueException("X not set for Piece");
		}
		return (int) $this->_x;
	}
	
	/**
	 * Defines the Y place in the arena of this piece.
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
			throw new \UnexpectedValueException("Y not set for Piece");
		}
		return (int) $this->_y;
	}
}
