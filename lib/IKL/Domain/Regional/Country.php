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

require_once 'IKL/Domain/Abstract.php';

/**
 * Regional Module: Country Class
 * 
 * @access public
 */
class IKL_Domain_Regional_Country
  extends IKL_Domain_Abstract
{
	const STATE_NEUTRAL 			= 0;
	const STATE_REGION_CREATE = 1;
	
	/**
	 * @var string
	 */
	private static $idPattern = '/^[A-Z]{2}$/i';
	
	/**
	 * @var int
	 */
	private $state = self::STATE_NEUTRAL;
	
  /**
   * @see IKL_Domain_Abstract::create()
   * @param string $ID Country code according to ISO 3166-1 Alpha-2
   *   (2 letters, upper case).
   * @param string $englishName
   * @param string $nativeName
   * @throws IKL_Domain_Exception_StringFormat if $id is not formatted as it should.
   * @return IKL_Domain_Regional_Country
   */
  public static function create($id, $englishName, $nativeName)
  {
    $country = new self();
    $country->setId($id);
    $country->setEnglishName($englishName);
    $country->setNativeName($nativeName);
    return $country;
  }
  
  /**
   * @param IKL_Domain_Regional_Country_EDO_Interface $edo
   * @return IKL_Domain_Regional_Country
   */
  public static function restore(IKL_Domain_Regional_Country_EDO_Interface $edo)
  {
    $entity = new self($edo);
    return $entity;
  }
  
  /**
   * @see IKL_Domain_Abstract::invoke()
   */
  public function invoke(IKL_Domain_Regional_Country_EDO_Interface $edo)
  {
  	parent::invoke($edo);
  }
  
  /**
   * @param string $id Country code according to ISO 3166-1 Alpha-2
   *   (2 letters, upper case).
   * @throws IKL_Domain_Exception_StringFormat if $id format is invalid.
   * @return void
   */
  public function setId($id)
  {
    $this->validateStringPropFormat('id', $id, self::$idPattern);
    $this->data->setId($id);
  }
  
  /**
   * @param string $name
   * @return void
   */
  public function setEnglishName($name)
  {
  	$name = ucwords(strtolower($name));
    $this->data->setEnglishName(ucwords(strtolower($name)));
  }
  
  /**
   * Return the name of current country in english.
   * 
   * @return string
   */
  public function getEnglishName()
  {
    return $this->data->getEnglishName();
  }
  
  /**
   * @param string $name
   * @return void
   */
  public function setNativeName($name)
  {
  	$name = ucwords(strtolower($name));
    $this->data->setNativeName($name);
  }
  
  /**
   * Return the name of current country in its primary language.
   * 
   * @return string
   */
  public function getNativeName()
  {
    return $this->data->getNativeName();
  }
  
  /**
   * INTERNAL FUNCTION
   * Tells whether we're in the process of creating a region or not.
   * 
   * @return bool
   */
  public function int__creatingRegion()
  {
  	return ($this->state == self::STATE_REGION_CREATE);
  }
  
  /**
   * Create a region within this country.
   * 
   * @param string $name Name of the region.
   * @return IKL_Domain_Regional_Region
   */
  public function createRegion($name)
  {
  	$this->state = self::STATE_REGION_CREATE;
  	$region = IKL_Domain_Regional_Region::create($this, $name);
  	$this->state = self::STATE_NEUTRAL;
    $this->data->getRegions()->add($region);
    return $region;
  }
  
  /**
   * Get regions iterator for current country.
   * 
   * @return Iterator
   */
  public function getRegionsIterator()
  {
    return $this->data->getRegions()->getIterator();
  }
}
?>