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
 * @access public
 */
class IKL_Domain_Account_Household
	extends IKL_Domain_Account_Abstract
{
	/**
	 * Create a new household account.
	 * 
	 * @param string $accountName
	 * @return IKL_Domain_Account_Household
	 */
	public static function create($accountName)
	{
		$account = new self();
		$account->setName($accountName);
		return $account;
	}
	
  /**
   * Restore an existing household account.
   * 
   * @param IKL_Domain_EDO_Interface $data
   * @return IKL_Domain_Account_Household
   */
  public static function restore(IKL_Domain_EDO_Interface $data)
  {
    $entity = new self($data);
    return $entity;
  }
  
  /**
   * @see IKL_Domain_Abstract::invoke()
   */
  public function invoke(IKL_Domain_Account_Household_EDO_Interface $edo) {
  	parent::invoke($edo);
  }
}
?>