<?php
/**
 *
 *
 * @package IKL
 * @subpackage Domain
 * @since 2007-08-11
 * @version 2007-11-03
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

require_once 'IKL/Domain/Abstract.php';

/**
 * Regional Module: Region Class
 * 
 * @access public
 */
class IKL_Domain_Regional_Region
  extends IKL_Domain_Abstract
{
	const STATE_NEUTRAL 		= 0;
	const STATE_CITY_CREATE = 1;
	
	/**
	 * @var int
	 */
	private $state = self::STATE_NEUTRAL;
	
  /**
   * Creates a region.
   * 
   * This method must not be called from outside. Its only purpose is to
   * let a country entity create its regions.
   * 
   * @param IKL_Domain_Regional_Country $country The country the region will
   * 	 appear in.
   * @param string $name
   * @throws IKL_Domain_Exception if not called from a country entity.
   * @return IKL_Domain_Regional_Region
   */
  public static function create(IKL_Domain_Regional_Country $country, $name)
  {
    $region = new self();
    $region->setName($name);
    $region->setCountry($country);
    
    // Make sure the create call came from $country:
    if (!$country->int__creatingRegion()) {
    	throw new IKL_Domain_Exception('explicit call to create() not allowed');
		}
    
    return $region;
  }
  
  /**
   * @param IKL_Domain_Regional_Region_EDO_Interface $edo
   * @return IKL_Domain_Regional_Region
   */
  public static function restore(IKL_Domain_Regional_Region_EDO_Interface $edo)
  {
    $entity = new self($edo);
    return $entity;
  }
  
  /**
   * @see IKL_Domain_Abstract::invoke()
   */
  public function invoke(IKL_Domain_Regional_Region_EDO_Interface $edo)
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
   * @param IKL_Domain_Regional_Country $country
   * @return void
   */
  private function setCountry(IKL_Domain_Regional_Country $country)
  {
  	$this->data->setCountry($country);
  }
  
  /**
   * Get the country in which this region is located.
   *
   * @return IKL_Domain_Regional_Country
   */
  public function getCountry()
  {
    return $this->data->getCountry();
  }
  
  /**
   * INTERNAL FUNCTION
   * Tells whether we're in the process of creating a city or not.
   * 
   * @return bool
   */
  public function int__creatingCity()
  {
  	return ($this->state == self::STATE_CITY_CREATE);
  }
  
  /**
   * Creates a city within this region and returns it.
   *
   * @param string $name
   * @return IKL_Domain_Regional_City
   */
  public function createCity($name)
  {
  	$this->state = self::STATE_CITY_CREATE;
  	$city = IKL_Domain_Regional_City::create($this, $name);
  	$this->state = self::STATE_NEUTRAL;
  	$this->data->getCities()->add($city);
  	return $city;
  }
  
  /**
   * Get iterator of cities in this region.
   * 
   * @return Iterator
   */
  public function getCitiesIterator()
  {
    return $this->data->getCities()->getIterator();
  }
}
?>