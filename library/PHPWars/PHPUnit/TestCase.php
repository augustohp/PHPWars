<?php
namespace PHPWars\PHPUnit;
/**
 * Description of TestCase
 *
 * @package		PHPWars/PHPUnit
 * @subpackage	
 * @uses		PHPUnit_Framework_TestCase
 * @author		Augusto Pascutti <augusto@phpsp.org.br>
 */
class TestCase extends \PHPUnit_Framework_TestCase
{

	/**
	 *@ignore
	 */
	public function __construct($name = NULL, array $data = array(), $dataName = '')
	{
		parent::__construct($name, $data, $dataName);
	}
}
