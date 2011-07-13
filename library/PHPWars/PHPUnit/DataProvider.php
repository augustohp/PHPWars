<?php
/**
 * @namespace
 */
namespace PHPWars\PHPUnit;

/**
 * DataProvider for unit tests.
 *
 * @package     PHPWars\PHPUnit
 * @since		0.0.1
 * @author      Augusto Pascutti <augusto@phpsp.org.br>
 */
class DataProvider 
{
	/**
	 * Returns valid integers to be used in the X/Y attributes of placeable and
	 * containeable objects.
	 *
	 * @return array
	 */
	public static function validIntForPlane()
	{
		return array(
			array(1),
			array(20),
			array(7)
		);
	}
	
	/**
	 * Returns valid pieces to be places into tiles.
	 *
	 * @return array
	 */
	public static function validPieces()
	{
		return array(
			array(new \PHPWars\Piece\Wall)
		);
	}
}
