<?php
/**
 *
 *
 * @package IKL
 * @subpackage Domain
 * @since 2007-11-17
 * @version 2007-11-17
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

require_once 'IKL/Domain/EDO/Interface.php';

/**
 * @access public
 */
interface IKL_Domain_Account_Membership_EDO_Interface
	extends IKL_Domain_EDO_Interface
{
	/**
	 * @param IKL_Domain_Account_LoginSession_Key $key
	 * @return void
	 */
	public function setId(IKL_Domain_Account_Membership_Key $key);
	
	/**
	 * @return IKL_Domain_Account_LoginSession_Key
	 */
	public function getId();
}
?>