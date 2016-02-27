<?php
/**
 *
 *
 * @package IKL
 * @subpackage Domain
 * @since 2007-11-24
 * @version 2007-11-24
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

require_once 'IKL/Domain/Abstract.php';
require_once 'Key.php';

/**
 * @access public
 */
abstract class IKL_Domain_Account_Membership_Abstract
	extends IKL_Domain_Abstract
{
  /**
   * @see IKL_Domain_Abstract::invoke()
   */
  public function invoke(IKL_Domain_Account_Membership_EDO_Interface $edo)
  {
  	parent::invoke($edo);
  }
  
  /**
   * Get user.
   * 
   * @return IKL_Domain_Account_User
   */
  public function getUser()
  {
  	return $this->data->getId()->getUser();
  }
  
  /**
   * Get account.
   * 
   * @return IKL_Domain_Account_Abstract
   */
  public function getAccount()
  {
  	$this->data->getId()->getAccount();
  }
}
?>