<?php
/**
 *
 *
 * @package IKL
 * @subpackage Domain
 * @since 2007-08-22
 * @version 2007-11-03
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

require_once 'IKL/Domain/EDO/Interface.php';

/**
 * @access public
 */
interface IKL_Domain_Regional_Region_EDO_Interface
  extends IKL_Domain_EDO_Interface
{
	/**
	 * @param string $id
	 * @return void
	 */
	public function setId($id);
	
	/**
	 * @return string
	 */
	public function getId();
	
  /**
   * @param string $name
   * @return void
   */
  public function setName($name);
  
  /**
   * @return string
   */
  public function getName();
  
  /**
   * @param IKL_Domain_Regional_Country $country
   * @return void
   */
  public function setCountry(IKL_Domain_Regional_Country $country);
  
  /**
   * @return IKL_Domain_Regional_Country
   */
  public function getCountry();
  
  /**
   * @return IKL_Domain_List_Interface
   */
  public function getCities();
}
?>