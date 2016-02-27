<?php
/**
 *
 *
 * @package IKL
 * @subpackage Domain
 * @since 2007-08-27
 * @version 2007-11-03
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

require_once 'IKL/Domain/EDO/Interface.php';

/**
 * @access public
 */
interface IKL_Domain_Language_EDO_Interface
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
  public function setNativeName($name);
  
  /**
   * @return string
   */
  public function getNativeName();
}
?>