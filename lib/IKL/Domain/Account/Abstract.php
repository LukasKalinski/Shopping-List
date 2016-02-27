<?php
/**
 *
 *
 * @package IKL
 * @subpackage Domain
 * @since 2007-11-03
 * @version 2007-11-17
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

require_once 'IKL/Domain/Abstract.php';

/**
 * Account Module: Abstract Account Base Class
 * 
 * @access public
 */
abstract class IKL_Domain_Account_Abstract
	extends IKL_Domain_Abstract
{
	const STATE_NEUTRAL = 0;
	const STATE_USER_CREATE = 1;
	
	/**
	 * @var string
	 */
	private static $namePattern = '/^[a-z][a-z0-9_]{1,15}$/i';
	
	/**
	 * @var int
	 */
	private $state = self::STATE_NEUTRAL;
	
	/**
	 * Change the account name.
	 * 
	 * @param string $accountName
	 * @return void
	 */
	public function setName($accountName)
	{
		$this->validateNameFormat($accountName);
		$this->data->setName($accountName);
	}
	
	/**
	 * Return the date 
	 * 
	 * @return string
	 */
	public function getCreationDate()
	{
		return $this->data->getCreationDate();
	}
	
	/**
	 * Return the name of the admin account.
	 * 
	 * @return string
	 */
	public function getName()
	{
		return $this->data->getName();
	}
	/**
	 * Validates a name and throws an exception if that validation fails.
	 * 
	 * @param string $name
	 * @throws IKL_Domain_Exception_StringFormat
	 * @return void
	 */
	final protected function validateNameFormat($name)
	{
		$this->validateStringPropFormat('name', $name, self::$namePattern);
	}
	
	/**
	 * Create a user for this account.
	 * 
	 * @param string $userName
	 * @return IKL_Domain_Account_User
	 */
	public function createUser($userName)
	{
		$this->state = self::STATE_USER_CREATE;
		$user = IKL_Domain_Account_User::create($userName, $this);
		$this->state = self::STATE_NEUTRAL;
		$this->data->getUsers()->insert($user);
	}
	
  /**
   * INTERNAL FUNCTION
   * Tells whether we're in the process of creating a user or not.
   * 
   * @return bool
   */
  public function int__creatingUser()
  {
  	return ($this->state == self::STATE_USER_CREATE);
  }
}
?>