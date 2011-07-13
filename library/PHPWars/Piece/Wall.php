<?php
/**
 * @namespace
 */
namespace PHPWars\Piece;

/**
 * A wall is a block that occupies a whole tile of the arena and cannot 
 * be attacked.
 *
 * @package     PHPWars/Piece
 * @subpackage  none
 * @since       0.0.1
 * @author      Augusto Pascutti <augusto@phpsp.org.br>
 */
class Wall extends AbstractPiece
{
	/**
	 * @inheritdoc
	 */
	public function getSize()
	{
		return 1;
	}
}
