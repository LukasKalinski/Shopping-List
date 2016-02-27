<?php
/**
 *
 *
 * @package IKLTest
 * @subpackage Domain
 * @since 2007-11-03
 * @version 2007-11-03
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

require_once 'IKL/Domain/Regional/Region/EDO/Interface.php';
require_once 'IKLTest/DomainTest/Mock/EDO/Abstract.php';

/**
 * @access private
 */
class DomainTest_Mock_Regional_Region_EDO
	extends DomainTest_Mock_EDO_Abstract
	implements IKL_Domain_Regional_Region_EDO_Interface
{
	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->set('cities', new IKL_Domain_List('Regional_City'));
	}
	
	/**
	 * @param string $id
	 * @return void
	 */
	public function setId($id)
	{
		$this->set(self::ID_FIELD, $id);
	}
	
	/**
	 * @return string
	 */
	public function getId()
	{
		return $this->get(self::ID_FIELD);
	}
	
  /**
   * @param string $name
   * @return void
   */
  public function setName($name)
	{
		$this->set('name', $name);
	}
  
  /**
   * @return string
   */
  public function getName()
	{
		return $this->get('name');
	}
  
  /**
   * @param IKL_Domain_Regional_Country $country
   * @return void
   */
  public function setCountry(IKL_Domain_Regional_Country $country)
	{
		$this->set('country', $country);
	}
  
  /**
   * @return IKL_Domain_Regional_Country
   */
  public function getCountry()
	{
		return $this->get('country');
	}
  
  /**
   * @return IKL_Domain_List_Interface
   */
  public function getCities()
	{
		return $this->get('cities');
	}
}
?>