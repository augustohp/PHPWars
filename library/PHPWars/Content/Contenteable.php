<?php
/**
 * @namespace
 */
namespace PHPwars\Content;

use PHPWars\Piece\Placeable;

/**
 * Interface for places (tiles) in the arena.
 * A place is somewhere into the plane (X,Y) that can have a content, in other
 * words, is the place where players and objects can move into.
 * 
 * @package		PHPWars/Content
 * @since		0.0.1
 * @author		Augusto Pascutti <augusto@phpsp.org.br>
 */
interface Contenteable
{
	/**
	 * Returns the X position in the arena of this tile.
	 * 
	 * @throws UnexpectedValueException If x is not set
	 * @return int
	 */
	public function getX();
	
	/**
	 * Returns the Y position in the arena of this tile.
	 * 
	 * @throws UnexpectedValueException If y is not set
	 * @return int
	 */
	public function getY();
	
	/**
	 * Returns if there is any content in here. If it has, the player cannot
	 * move to thhis place.
	 * If a parameter is given, then it checks if it exists into the collection.
	 * 
	 * @param	Placeable[optional] $object
	 * @return	boolean
	 */
	public function hasContent(Placeable $object = null);
	
	/**
	 * Returns the content of the tile.
	 * 
	 * @throws	UnexpectedValueException	Collection not initialized
	 * @returns PHPWars\Content\Collection
	 */
	public function getContent();
	
	/**
	 * Returns if an oject can be moved to this place.
	 * 
	 * @param	Placeable	$object
	 * @return	boolean
	 */
	public function canMoveHere(Placeable $object);
	
	/**
	 * Returns the size of this place.
	 * The size, defines how many players/objects can be put into this place.
	 * 
	 * @return int.
	 */
	public function getSize();
}