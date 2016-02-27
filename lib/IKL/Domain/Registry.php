<?php
/**
 *
 *
 * @package IKL
 * @subpackage Domain
 * @since 2007-08-26
 * @version 2007-11-24
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

/**
 * Domain Registry
 * 
 * @pattern Singleton
 * @access public
 */
class IKL_Domain_Registry
{
  /**
   * @var IKL_Domain_DataSource
   */
  private static $instance;
  
  /**
   * @var IKL_Domain_EntityManager_Interface
   */
  private $entityManager = null;
  
  /**
   * @var IKL_Domain_DataSource_Finder_Supplier_Interface
   */
  private $finderSupplier = null;
  
  /**
   * @var IKL_Domain_Language
   */
  private $primaryLanguage = null;
  
  /**
   * @var IKL_Domain_Language
   */
  private $secondaryLanguage = null;
  
  /**
   * Singleton instance distributor.
   * 
   * @return IKL_Domain_Registry
   */
  public static function instance()
  {
    if (!self::$instance) {
      self::$instance = new self();
    }
    return self::$instance;
  }
  
  /**
   * Prevent public creation.
   */
  private function __construct()
  {
  }
  
  /**
   * Sets an entity manager for the domain to use.
   * 
   * @param IKL_Domain_EntityManager_Interface $entityManager
   * @return void
   */
  public function setEntityManager(
  	IKL_Domain_EntityManager_Interface $entityManager)
  {
    $this->entityManager = $entityManager;
  }
  
  /**
   * Sets a domain object finder supplier for the domain to use.
   * 
   * @param IKL_Domain_DataSource_Finder_Supplier_Interface $finderSupplier
   * @return void
   */
  public function setFinderSupplier(
    IKL_Domain_DataSource_Finder_Supplier_Interface $finderSupplier)
  {
    $this->finderSupplier = $finderSupplier;
  }
  
  /**
   * Returns a finder for a specific domain entity class.
   * 
   * @param string $entityName Class name seen from IKL_Domain_* namespace.
   * @throws IKL_Domain_Exception if no finder is found.
   * @throws IKL_Domain_Exception if the returned finder is of wrong type.
   * @return IKL_DataSource_FinderInterface
   */
  public function getFinder($entityName)
  {
    $className = "IKL_Domain_$entityName";
    $finderInterface = "IKL_Domain_{$entityName}_Finder_Interface";
   	
    $finder = $this->finderSupplier->getFinder($className);
    
    // Make sure we got a finder:
    if (!$finder) {
    	throw IKL_Domain_Exception("no finder found for class $className");
		}
    
    // Make sure we got the right finder type:
    if (!$finder instanceof $finderInterface) {
    	throw IKL_Domain_Exception('invalid finder');
		}
    
    return $finder;
  }
  
  /**
   * Returns an entity manager.
   * 
   * @return IKL_Domain_EntityManager_Interface
   */
  public function getEntityManager()
  {
    return $this->entityManager;
  }
  
  /**
   * Sets languages to use when getting language expressions from domain layer.
   * 
   * @param IKL_Domain_Language $primary The primary language.
   * @param IKL_Domain_Language $secondary The language to use when something
   * 	 isn't found in the primary language.
   * @return void
   */
  public function setLanguages(
  	IKL_Domain_Language $primary,
  	IKL_Domain_Language $secondary)
  {
  	$this->primaryLanguage 		= $primary;
  	$this->secondaryLanguage 	= $secondary;
  }
  
  /**
   * Get the primary language.
   * 
   * @return IKL_Domain_Language
   */
  public function getPrimaryLanguage()
  {
  	return $this->primaryLanguage;
  }
  
  /**
   * Get the secondary language.
   * 
   * @return IKL_Domain_Language
   */
  public function getSecondaryLanguage()
  {
  	return $this->secondaryLanguage;
  }
}
?>