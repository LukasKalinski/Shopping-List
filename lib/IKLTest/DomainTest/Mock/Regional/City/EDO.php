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

require_once 'IKL/Domain/Regional/City/EDO/Interface.php';
require_once 'IKLTest/DomainTest/Mock/EDO/Abstract.php';

/**
 * @access private
 */
class DomainTest_Mock_Regional_City_EDO
	extends DomainTest_Mock_EDO_Abstract
	implements IKL_Domain_Regional_City_EDO_Interface
{
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
   * @param IKL_Domain_Regional_Region $region
   * @return void
   */
  public function setRegion(IKL_Domain_Regional_Region $region)
  {
  	$this->set('region', $region);
  }
  
  /**
   * @return IKL_Domain_Regional_Region
   */
  public function getRegion()
  {
  	return $this->get('region');
	}
}
?>