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
class IKL_DataSource_DomainList
  implements IKL_Domain_List_Interface
{
  /**
   * @var array
   */
  private $rows = array();
  
  /**
   * @var array
   */
  private $objects = array();
  
  /**
   *
   * @return IKL_DataSource_DomainList
   */
  public static function createGhost()
  {
    
  }
  
  /**
   *
   * @return IKL_DataSource_DomainList
   */
  public static function createLoaded()
  {
    
  }
  
  /**
   * Contructor
   * 
   * Prevent direct creation.
   */
  private function __construct()
  {
  }
  
  /**
   * Adds a domain object to the list.
   * 
   * @see IKL_Domain_List_Interface::add()
   * @param IKL_Domain_Abstract $domainObject
   * @return void
   */
  public function add(IKL_Domain_Abstract $domainObject)
  {
    
  }
  
  /**
   * Removes a domain object from the list.
   * 
   * @see IKL_Domain_List_Interface::remove()
   * @param IKL_Domain_Abstract $domainObject
   * @return void
   */
  public function remove(IKL_Domain_Abstract $domainObject)
  {
    
  }
  
  /**
   * Returns an iterator starting at offset $offset and having a max number of
   * items limited to $limit.
   * 
   * @see IKL_Domain_List_Interface::getLimitedIterator()
   * @param int $offset
   * @param int $limit
   * @return IKL_Domain_List_Iterator
   */
  public function getLimitedIterator($offset, $limit)
  {
    
  }
}
?>