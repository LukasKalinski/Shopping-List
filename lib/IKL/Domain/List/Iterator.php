<?php
/**
 *
 *
 * @package IKL
 * @subpackage Domain
 * @since 2007-08-11
 * @version 2007-11-24
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

/**
 * @access private
 */
class IKL_Domain_List_Iterator implements Iterator
{
  /**
   * @var array
   */
  private $objects;
  
  /**
   * @var IKL_Domain_List
   */
  private $entityList;
  
  /**
   * Constructor
   * 
   * @param array $objects
   * @param IKL_Domain_List $list The list that the items originate from.
   */
  public function __construct(array $objects, IKL_Domain_List $list)
  {
    $this->objects = $objects;
    $this->entityList = $list;
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
  
  /**
   * Returns true if the iterator contains $entityName entities.
   * 
   * @param string $entityName Name of entity, like the class name but without
   * 	 the 'IKL_Domain_' prefix.
   * @return bool
   */
  public function containerOf($entityName)
  {
  	return $this->entityList->containerOf($entityName);
  }
}
?>