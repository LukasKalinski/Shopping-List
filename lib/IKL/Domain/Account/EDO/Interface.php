<?php
/**
 *
 *
 * @package IKL
 * @subpackage Domain
 * @since 2007-11-10
 * @version 2007-11-17
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

require_once 'IKL/Domain/EDO/Interface.php';

/**
 * Base Interface for all Account EDO's.
 * 
 * @access public
 */
interface IKL_Domain_Account_EDO_Interface
	extends IKL_Domain_EDO_Interface
{
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
	 * @return string
	 */
	public function getCreationDate();
}
?>