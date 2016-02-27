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
 * 
 * @pattern Singleton
 * @access private
 */
class IKL_DataSource_UnitOfWork
  implements IKL_Domain_DataSource_UOWInterface
{
  /**
   * @var IKL_DataSource_UnitOfWork
   */
  private static $instance;
  
  /**
   * All current domain objects.
   * 
   * @var array
   */
  private $allObjects = array();
  
  /**
   * All current and new domain objects.
   * 
   * @var array
   */
  private $newObjects = array();
  
  /**
   * All current and changed domain objects.
   * 
   * @var array
   */
  private $dirtyObjects = array();
  
  /**
   * All current and removed domain objects.
   * 
   * @var array
   */
  private $removedObjects = array();
  
  /**
   * Singleton instance distributor.
   * 
   * @return IKL_DataSource_UnitOfWork
   */
  public static function instance()
  {
    if (!self::$instance) {
      self::$instance = new self();
    }
    return self::$instance;
  }
  
  /**
   * Constructor
   * 
   * Prevents outside instantiation.
   */
  private function __construct()
  {
  }
  
  /**
   * Loads a ghosted entity.
   * 
   * @see IKL_Domain_DataSource_UOWInterface::load()
   * @param IKL_Domain_Abstract $entity
   * @return void
   */
  public function load(IKL_Domain_Abstract $entity)
  {
    
  }
  
  /**
   * Registers an entity as new and assigns an ID to it, making it available
   * in the identity map.
   * 
   * @see IKL_Domain_DataSource_UOWInterface::registerNew()
   * @param IKL_Domain_Abstract $entity
   * @return void
   */
  public function registerNew(IKL_Domain_Abstract $entity)
  {
    
  }
  
  /**
   * Registers an entity as dirty.
   * 
   * @see IKL_Domain_DataSource_UOWInterface::registerDirty()
   * @param IKL_Domain_Abstract $entity
   * @return void
   */
  public function registerDirty(IKL_Domain_Abstract $entity)
  {
    
  }
  
  /**
   * Registers an entity as deleted.
   * 
   * @see IKL_Domain_DataSource_UOWInterface::registerDeleted()
   * @param IKL_Domain_Abstract $entity
   * @return void
   */
  public function registerDeleted(IKL_Domain_Abstract $entity)
  {
    
  }
}
?>