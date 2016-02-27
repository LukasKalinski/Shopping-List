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

require_once 'IKL/Domain/Regional/Country/EDO/Interface.php';
require_once 'IKLTest/DomainTest/Mock/EDO/Abstract.php';

/**
 * @access private
 */
class DomainTest_Mock_Regional_Country_EDO
	extends DomainTest_Mock_EDO_Abstract
	implements IKL_Domain_Regional_Country_EDO_Interface
{
	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->set('regions', new IKL_Domain_List('Regional_Region'));
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
  public function setEnglishName($name)
	{
		$this->set('engName', $name);
	}
  
  /**
   * @param string $name
   * @return void
   */
  public function setNativeName($name)
	{
		$this->set('natName', $name);
	}
  
  /**
   * @return string
   */
  public function getEnglishName()
	{
		return $this->get('engName');
	}
  
  /**
   * @return string
   */
  public function getNativeName()
	{
		return $this->get('natName');
	}
  
  /**
   * @return IKL_Domain_List_Interface
   */
  public function getRegions()
	{
		return $this->get('regions');
	}
}
?>