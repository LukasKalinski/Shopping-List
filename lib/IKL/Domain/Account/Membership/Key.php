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

require_once 'IKL/Domain/CompositeKey/Abstract.php';

/**
 * @access private
 * @pattern Value Object
 */
class IKL_Domain_Account_Membership_Key
	extends IKL_Domain_CompositeKey_Abstract
{
	/**
	 * @var IKL_Domain_Account_User
	 */
	private $user;
	
	/**
	 * @var IKL_Domain_Account_Abstract
	 */
	private $account;
	
	/**
	 * Constructor
	 * 
	 * @param IKL_Domain_Account_User $user
	 * @param IKL_Domain_Account_Abstract $account
	 */
	public function __construct(
		IKL_Domain_Account_User $user,
		IKL_Domain_Account_Abstract $account)
	{
		$this->user = $user;
		$this->account = $account;
	}
	
	/**
	 * Get user.
	 * 
	 * @return IKL_Domain_Account_User
	 */
	public function getUser()
	{
		return $this->user;
	}
	
	/**
	 * Get account.
	 * 
	 * @return IKL_Domain_Account_Abstract
	 */
	public function getAccount()
	{
		return $this->account;
	}
	
	/**
	 * @see IKL_Domain_CompositeKey_Abstract::__toString()
	 */
	public function __toString()
	{
		return ((string) $this->account->getId())
				 	 . ':' .
				 	 ((string) $this->user->getId());
	}
}
?>