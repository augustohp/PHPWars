<?php
/**
 * @namespace
 */
namespace PHPWars\Content;

use PHPWars\Piece\Placeable;

/**
 * A collection of elements that makes a single tile.
 * The size in this class is not the number of elements, it is the sum of the
 * size attribute of each element into this collection.
 *
 * @todo		Validate the size of the collection
 * @package     PHPWars/Content
 * @since		0.0.1
 * @uses        Iterator, Countable
 * @author      Augusto Pascutti <augusto@phpsp.org.br>
 */
class Collection implements \Iterator, \Countable
{
	/**
	 * Valid size this collection can hold.
	 * The size is not the number of elements, but the weight of contents this
	 * collection can hold.
	 *
	 * @var int
	 */
	private $_validSize;
	
	/**
	 * The collection of contents (Placeable) objects.
	 *
	 * @var array
	 */
	private $_contents;
	
	/**
	 * The current key that is been used.
	 *
	 * @var int
	 */
	private $_current;
	
	/**
	 * Constructor.
	 *
	 * @param float $size 
	 */
	public function __construct($size = null)
	{
		if (!is_null($size)) {
			$this->setSize($size);
		}
		$this->reset();
	}
	
	/**
	 * Defines the allowed maximum size to be held into this collection.
	 *
	 * @param	float $float
	 * @return	Collection
	 */
	public function setSize($float)
	{
		$this->_validSize = $float;
	}
	
	/**
	 * Returns the size allowed for this collection.
	 *
	 * @return float
	 */
	public function getSize()
	{
		if (empty($this->_validSize)) {
			throw new \UnexpectedValueException('Size not set for collection');
		}
		return $this->_validSize;
	}
	
	/**
	 * Returns of the given element can be appended to this collection.
	 *
	 * @param Placeable $what
	 * @return boolean
	 */
	public function canAppend(Placeable $what)
	{
		$size  = $this->count();
		$size += $what->getSize();
		return ($size <= $this->getSize());
	}
	
	/**
	 * Inserts a new element into this collection.
	 *
	 * @throws	InvalidArgumentException	When the size exceeds the allowed
	 * @param	Contenteable	$mixed
	 * @return	Collection 
	 */
	public function append(Placeable $mixed)
	{
		if (!$this->canAppend($mixed)) {
			$msg = "The size of this collection was exceeded!";
			throw new \InvalidArgumentException($msg);
		}
		$this->_contents[] = $mixed;
		return $this;
	}
	
	/**
	 * @see http://br.php.net/manual/pt_BR/class.iterator.php
	 * @inheritdoc
	 */
	public function rewind()
	{
		$this->_current = 0;
	}
	
	/**
	 * @see http://br.php.net/manual/pt_BR/class.iterator.php
	 * @inheritdoc
	 */
	public function current()
	{
		return $this->_contents[$this->_current];
	}
	
	/**
	 * @see http://br.php.net/manual/pt_BR/class.iterator.php
	 * @inheritdoc
	 */
	public function key()
	{
		return $this->_current;
	}
	
	/**
	 * @see http://br.php.net/manual/pt_BR/class.iterator.php
	 * @inheritdoc
	 */
	public function next()
	{
		++$this->_current;
	}
	
	/**
	 * @see http://br.php.net/manual/pt_BR/class.iterator.php
	 * @inheritdoc
	 */
	public function valid()
	{
		return isset($this->_contents[$this->_current]);
	}
	
	/**
	 * Resets the content of this collection.
	 */
	public function reset()
	{
		$this->_contents = array();
	}
	
	/**
	 * Returns the current size used into this collection.
	 * 
	 * @see		http://br.php.net/manual/pt_BR/class.countable.php
	 * @return	int
	 */
	public function count()
	{
		$size = 0;
		foreach ($this as $tile) {
			$size += $tile->getSize();
		}
		$this->rewind();
		return $size;
	}
}
