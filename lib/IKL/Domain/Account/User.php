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
 * Account Module: User
 * 
 * Constraints:
 * - Every instance must belong to at least one account.
 * 
 * @access public
 */
class IKL_Domain_Account_User
	extends IKL_Domain_Abstract
{
	const PATTERN_NAME 		= '/^[a-z][a-z0-9_]{1,15}$/i';
	const PATTERN_GENDER 	= '/^M|F$/';
	const PATTERN_EMAIL 	= '/^.+@.+\..+$/i'; // Not very restrictive...
	const MAXLEN_EMAIL		= 200;
	
	/**
	 * Creates a user.
	 * 
	 * This method must not be called from outside. Its only purpose is to
   * let an account entity create its users.
	 * 
	 * @param string $name
	 * @param string $gender
	 * @param string $dob The date of birth.
	 * @param string $email
	 * @param IKL_Domain_Account_Abstract $account The account that's responsible
	 * 	 for creating the user.
	 * @throws IKL_Domain_Exception_StringFormat
	 * @return IKL_Domain_Account_User
	 */
	public static function create(
		$name,
		$gender,
		$dob,
		$email,
		IKL_Domain_Account_Abstract $account)
	{
		$user = new self();
		$user->setName($name);
		
    // Make sure the create call came from $account:
    if (!$account->int__creatingUser()) {
    	throw new IKL_Domain_Exception('explicit call to create() not allowed');
		}
    
    return $user;
	}
	
  /**
   * @param IKL_Domain_Account_User_EDO_Interface $data
   * @return IKL_Domain_Account_User
   */
  public static function restore(IKL_Domain_Account_User_EDO_Interface $data)
  {
    $entity = new self($data);
    return $entity;
  }
  
  /**
   * @see IKL_Domain_Abstract::invoke()
   */
  public function invoke(IKL_Domain_Account_User_EDO_Interface $edo)
  {
  	parent::invoke($edo);
  }
  
	/**
	 * Change the name of the user.
	 * 
	 * @param string $userName
	 * @throws IKL_Domain_Exception_StringFormat
	 * @return void
	 */
	public function setName($userName)
	{
		$this->validateStringPropFormat('name', $userName, self::PATTERN_NAME);
		$this->data->setName($userName);
	}
	
	/**
	 * Set user's email.
	 * 
	 * @param string $email
	 * @return void
	 */
	public function setEmail($email)
	{
		$this->validateStringPropFormat('email', $email, self::PATTERN_EMAIL);
		
		// Check email length:
		if (strlen($email) > self::MAXLEN_EMAIL) {
			throw new IKL_Domain_Exception_StringFormat(
				'email',
				"length($email) == " . strlen($email),
				'<= ' . self::MAXLEN_EMAIL
			);
		}
		
		$this->data->setEmail(strtolower($email));
	}
	
	/**
	 * Set user's date of birth.
	 * 
	 * @param int $dob Date of birth using format YYYYMMDD
	 * @return void
	 */
	private function setDateOfBirth($dob)
	{
		$y = (int) substr($dob, 0, 4);
		$m = (int) substr($dob, 4, 2);
		$d = (int) substr($dob, 6, 2);
		
		// Make sure the date is valid:
		if (!checkdate($m, $d, $y)) {
			throw new IKL_Domain_Exception("invalid date format: '$dob'");
		}
		
		// Make sure the date is less than current date:
		if (strtotime($dob) > time()) {
			throw new IKL_Domain_Exception(
				"future dates not accepted as date of birth"
			);
		}
		
		$this->data->setDOB($dob);
	}
	
	/**
	 * Set user's gender.
	 * 
	 * @param string $gender Gender expressed as 'M' of 'F'.
	 * @throws IKL_Domain_Exception_StringFormat
	 * @return void
	 */
	private function setGender($gender)
	{
		$this->validateStringPropFormat('gender', $gender, self::PATTERN_GENDER);
		$this->data->setGender($gender);
	}
	
	/**
	 * Get user name.
	 * 
	 * @return string
	 */
	public function getName()
	{
		return $this->data->getName();
	}
	
	/**
	 * Get user email.
	 * 
	 * @return string
	 */
	public function getEmail()
	{
		return $this->data->getEmail();
	}
	
	/**
	 * Get user gender ('M' or 'F').
	 * 
	 * @return string
	 */
	public function getGender()
	{
		return $this->data->getGender();
	}
	
	/**
	 * Get user date of birth.
	 * 
	 * @return string YYYYMMDD
	 */
	public function getDateOfBirth()
	{
		return $this->data->getDOB();
	}
}
?>