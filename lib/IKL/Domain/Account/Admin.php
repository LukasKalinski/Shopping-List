<?php
/**
 *
 *
 * @package IKL
 * @subpackage Domain
 * @since 2007-11-03
 * @version 2007-11-24
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

require_once 'IKL/Domain/Account/Abstract.php';

/**
 * Account Module: Admin Class
 * 
 * @access public
 */
class IKL_Domain_Account_Admin
	extends IKL_Domain_Account_Abstract
{
	/**
	 * Create a new admin account.
	 * 
	 * @param string $accountName
	 * @return IKL_Domain_Account_Admin
	 */
	public static function create($accountName)
	{
		$account = new self();
		$account->setName($accountName);
		return $account;
	}
	
  /**
   * Restore an existing admin account.
   * 
   * @param IKL_Domain_Account_Admin_EDO_Interface $data
   * @return IKL_Domain_Account_Admin
   */
  public static function restore(IKL_Domain_Account_Admin_EDO_Interface $data)
  {
    $entity = new self($data);
    return $entity;
  }
  
  /**
   * @see IKL_Domain_Abstract::invoke()
   */
  public function invoke(IKL_Domain_Account_Admin_EDO_Interface $edo)
  {
  	parent::invoke($edo);
  }
}
?>