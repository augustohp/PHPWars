<?php
/**
 * @namespace
 */
namespace PHPWars\Piece;

/**
 * Something that can be moved around the many tiles of a arena.
 *
 * @package     PHPWars/Piece
 * @since       0.0.1
 * @author      Augusto Pascutti <augusto@phpsp.org.br>
 */
interface Placeable 
{
	/**
	 * Returns the X position in the arena of this object.
	 * 
	 * @throws UnexpectedValueException If x is not set
	 * @return int
	 */
	public function getX();
	
	/**
	 * Returns the Y position in the arena of this object.
	 * 
	 * @throws UnexpectedValueException If y is not set
	 * @return int
	 */
	public function getY();
	
	/**
	 * Returns the size of this object.
	 * This limits the number of things that can be in the same tile at the same
	 * time.
	 * 
	 * @return int
	 */
	public function getSize();
}
