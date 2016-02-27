<?php
/**
 *
 *
 * @package IKL
 * @subpackage Domain
 * @since 2007-11-17
 * @version 2007-11-24
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

require_once 'IKL/Domain/EDO/Interface.php';

/**
 * @access public
 */
interface IKL_Domain_Account_User_EDO_Interface
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
	 * @param string $email
	 * @return void
	 */
	public function setEmail($email);
	
	/**
	 * Set Date of Birth.
	 * 
	 * @param string $dob
	 * @return void
	 */
	public function setDOB($dob);
	
	/**
	 * @param string $gender Gender expressed as 'M' of 'F'.
	 * @return void
	 */
	public function setGender($gender);
	
	/**
	 * @return string
	 */
	public function getName();
	
	/**
	 * @return string
	 */
	public function getEmail();
	
	/**
	 * @return string YYYYMMDD
	 */
	public function getDOB();
	
	/**
	 * @return string 'M' or 'F'
	 */
	public function getGender();
}
?>