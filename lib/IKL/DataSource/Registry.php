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
class IKL_DataSource_Registry
{
  /**
   * @var IKL_DataSource_Registry
   */
  private static $instance;
  
  /**
   * @var array
   */
  private $mapperMap = array();
  
  /**
   * Singleton instance distributor.
   * 
   * @return IKL_DataSource_Registry
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
   *
   * @param string $className
   * @return IKL_DataSource_Mapper_Abstract
   */
  public function getMapper($className)
  {
    
  }
  
  /**
   *
   * @param string $className
   * @throws IKL_DataSource_Exception if no finder is found.
   * @throws IKL_DataSource_Exception if the mapper is not a finder.
   * @return IKL_Domain_DataSource_FinderInterface
   */
  public function getFinder($className)
  {
    $finder = $this->getMapper($className);
    
    if (!$finder instanceof IKL_Domain_DataSource_FinderInterface) {
      throw new IKL_DataSource_Exception('mapper not a finder');
    }
    
    return $finder;
  }
}
?>