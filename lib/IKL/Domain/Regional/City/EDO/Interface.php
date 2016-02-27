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
interface IKL_Domain_Regional_City_EDO_Interface
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
   * @param IKL_Domain_Regional_Region $region
   * @return void
   */
  public function setRegion(IKL_Domain_Regional_Region $region);
  
  /**
   * @return IKL_Domain_Regional_Region
   */
  public function getRegion();
}
?>