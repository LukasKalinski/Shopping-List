<?php
/**
 *
 *
 * @package IKL
 * @subpackage Domain
 * @since 2007-08-11
 * @version 2007-11-10
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

/**
 * @access public
 */
interface IKL_Domain_List_Interface
	extends IteratorAggregate, Countable
{
  /**
   * Adds a domain object to the list.
   * 
   * @param IKL_Domain_Abstract $domainObject
   * @return void
   */
  public function add(IKL_Domain_Abstract $domainObject);
  
  /**
   * Removes a domain object from the list. Returns true if the object was
   * removed and false if it was not found in the list.
   * 
   * @param IKL_Domain_Abstract $domainObject
   * @return bool
   */
  public function remove(IKL_Domain_Abstract $domainObject);
  
  /**
   * Returns an iterator starting at offset $offset and having a max number of
   * items limited to $limit.
   * 
   * @param int $offset
   * @param int $limit
   * @return IKL_Domain_List_Iterator
   */
  public function getLimitedIterator($offset, $limit);
}
?>