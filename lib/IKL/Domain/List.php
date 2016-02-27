<?php
/**
 *
 *
 * @package IKL
 * @subpackage Domain
 * @since 2007-08-10
 * @version 2007-11-24
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

require_once 'List/Interface.php';
require_once 'List/Exception.php';
require_once 'List/Iterator.php';

/**
 * @access private
 */
class IKL_Domain_List
	implements IKL_Domain_List_Interface
{
  /**
   * Restricts items of this list to be instances of a specified class.
   * 
   * @var string
   */
  private $itemClass;
  
  /**
   * @var array
   */
  private $objects = array();
  
  /**
   * @var int
   */
  private $numObj = -1;
  
  /**
   * Constructor
   * 
   * @param string $itemClass Only allow items being a $entityName to be stored
   * 	 in the list. Note that $entityName should be supplied without the
   * 	 'IKL_Domain_' prefix.
   */
  public function __construct($entityName)
  {
    $this->itemClass = "IKL_Domain_$entityName";
  }
  
  /**
   * @see IteratorAggregate::getIterator()
   * @return IKL_Domain_List_Iterator
   */
  public function getIterator()
  {
    return new IKL_Domain_List_Iterator($this->objects, $this);
  }
  
  /**
   * Return the number of objects in current list.
   * 
   * @see Countable::count()
   * @return int
   */
  public function count()
  {
    if ($this->numObj == -1) {
      $this->numObj = count($this->objects);
    }
    return $this->numObj;
  }
  
  /**
   * @see IKL_Domain_List_Interface::add()
   * @throws IKL_Domain_List_Exception if the added object is not matching the
   *   list's class constraint.
   */
  public function add(IKL_Domain_Abstract $entity)
  {
    if (!$entity instanceof $this->itemClass) {
      throw new IKL_Domain_List_Exception(
        'Invalid object instance: ' . get_class($entity)
      );
    }
    
    $this->numObj++;
    $this->objects[(string) $entity->getId()] = $entity;
  }
  
  /**
   * Tells whether an entity is in the list or not.
   * 
   * @param IKL_Domain_Abstract
   * @return bool
   */
  public function contains(IKL_Domain_Abstract $entity)
  {
  	return isset($this->objects[(string) $entity->getId()]);
  }
  
  /**
   * @see IKL_Domain_List_Interface::remove()
   */
  public function remove(IKL_Domain_Abstract $entity)
  {
    $this->numObj--;
    if ($this->contains($entity)) {
    	unset($this->objects[(string) $entity->getId()]);
    	return true;
		}
		return false;
  }
  
  /**
   * @see IKL_Domain_List_Interface::getLimitedIteratr()
   * @return IKL_Domain_List_Iterator
   * 
   * @todo Ehh... why does this return an array? (2007-11-24)
   */
  public function getLimitedIterator($offset, $limit)
  {
    return array_slice($this->objects, $offset, $limit, true);
  }
  
  /**
   * Returns true if the list contains $entityName entities.
   * 
   * @param string $entityName Name of entity, like the class name but without
   * 	 the 'IKL_Domain_' prefix.
   * @return bool
   */
  public function containerOf($entityName)
  {
  	return ($this->itemClass == "IKL_Domain_$entityName");
  }
}
?>