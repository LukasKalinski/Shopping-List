<?php
/**
 *
 *
 * @package IKL
 * @subpackage DataSource
 * @since 2007-08-14
 * @version 2007-08-14
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

/**
 * @access private
 */
class IKL_DataSource_DomainList_Iterator
  implements Iterator
{
  /**
   * @var array
   */
  private $rows = null;
  
  /**
   * @var array
   */
  private $objects = null;
  
  /**
   * Constructor
   * 
   * @param array $rows
   * @param array &$objects The created objects array to maintain.
   */
  public function __construct(array $rows, array &$objects)
  {
    $this->rows = $rows;
    $this->objects =& $objects;
    $this->rewind();
  }
  
  /**
   * @see Iterator::rewind()
   * @return
   */
  public function rewind()
  {
    reset($this->objects);
  }
  
  /**
   * @see Iterator::current()
   * @return IKL_Domain_Abstract
   */
  public function current()
  {
    return current($this->objects);
  }

  /**
   * Instantiates if not yet instantiated and returns a object resulting
   * from row with index $index.
   * 
   * @param int $index
   * @return IKL_Domain_Abstract
   */
  private function getObjectAt($index)
  {
    
  }
  
  /**
   * @see Iterator::key()
   * @return string
   */
  public function key()
  {
    return key($this->objects);
  }

  /**
   * @see Iterator::next()
   * @return IKL_Domain_Abstract
   */
  public function next()
  {
    return next($this->objects);
  }

  /**
   * Check if there is a current element after calls to rewind() or next().
   * 
   * @see Iterator::valid()
   * @return bool
   */
  public function valid()
  {
    return (current($this->objects) !== false);
  }
}
?>