<?php
/**
 *
 *
 * @package IKL
 * @subpackage Domain
 * @since 2007-08-13
 * @version 2007-11-03
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

require_once 'IKL/Domain/Abstract.php';

/**
 * Regional Module: City Class
 * 
 * @access public
 */
class IKL_Domain_Regional_City
  extends IKL_Domain_Abstract
{
  /**
   * Creates a city.
   * 
   * This method should not be called from outside. Its only purpose is to
   * let a region entity create its cities.
   * 
   * @param IKL_Domain_Regional_Region $region The region the city will
   * 	 appear in.
   * @param string $name
   * @return IKL_Domain_Regional_City
   */
  public static function create(IKL_Domain_Regional_Region $region, $name)
  {
    $city = new self();
    $city->setName($name);
    $city->setRegion($region);
    
    // Make sure the create call came from $region:
    if (!$region->int__creatingCity()) {
    	throw new IKL_Domain_Exception('explicit call to create() not allowed');
		}
    
    return $city;
  }
  
  /**
   * @param IKL_Domain_Regional_City_EDO_Interface $edo
   * @return IKL_Domain_Regional_City
   */
  public static function restore(IKL_Domain_Regional_City_EDO_Interface $edo)
  {
    $entity = new self($edo);
    return $entity;
  }
  
  /**
   * @see IKL_Domain_Abstract::invoke()
   */
  public function invoke(IKL_Domain_Regional_City_EDO_Interface $edo)
  {
  	parent::invoke($edo);
  }
  
  /**
   * @param string $name
   * @return void
   */
  public function setName($name)
  {
  	$name = ucwords(strtolower($name));
    $this->data->setName($name);
  }
  
  /**
   * Get the name of current region.
   * 
   * @return string
   */
  public function getName()
  {
    return $this->data->getName();
  }
  
  /**
   * @param IKL_Domain_Regional_Region $region
   * @return void
   */
  private function setRegion(IKL_Domain_Regional_Region $region)
  {
  	$this->data->setRegion($region);
  }
  
  /**
   * Get the region in which this city is located.
   * 
   * @return IKL_Domain_Regional_Region
   */
  public function getRegion()
  {
    return $this->data->getRegion();
  }
}
?>