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
class IKL_Domain_Account_Sponsor
	extends IKL_Domain_Account_Abstract
{
	/**
	 * Create a new sponsor account.
	 * 
	 * @param string $accountName
	 * @return IKL_Domain_Account_Sponsor
	 */
	public static function create($accountName)
	{
		$account = new self();
		$account->setName($accountName);
		return $account;
	}
	
  /**
   * Restore an existing sponsor account.
   * 
   * @param IKL_Domain_Account_Sponsor_EDO_Interface $data
   * @return IKL_Domain_Account_Sponsor
   */
  public static function restore(IKL_Domain_Account_Sponsor_EDO_Interface $data)
  {
    $entity = new self($data);
    return $entity;
  }
  
  /**
   * @see IKL_Domain_Abstract::invoke()
   */
  public function invoke(IKL_Domain_Account_Sponsor_EDO_Interface $edo)
  {
  	parent::invoke($edo);
  }
}
?>