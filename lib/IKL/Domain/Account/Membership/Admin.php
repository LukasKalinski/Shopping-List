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

require_once 'Abstract.php';

/**
 * @access public
 */
abstract class IKL_Domain_Account_Membership_Admin
	extends IKL_Domain_Account_Membership_Abstract
{
	/**
	 * Creates a membership of an administrator account.
	 * 
	 * @param IKL_Domain_Account_User $user
	 * @param IKL_Domain_Account_Abstract $account
	 * @param IKL_Domain_List_Iterator $permissionsIterator
	 * @throws IKL_Domain_Exception if the permission iterator contains invalid
	 * 	 permissions.
	 * @return IKL_Domain_Account_Membership_Admin
	 */
	public static function create(
		IKL_Domain_Account_User $user,
		IKL_Domain_Account_Admin $account,
		IKL_Domain_List_Iterator $permissionsIterator)
	{
		// Make sure iterator contains valid permission instances:
		if (!$permissionsIterator->
			containerOf('Account_Membership_Permission_Admin')) {
			throw new IKL_Domain_Exception(
				'permission iterator contains invalid permissions'
			);
		}
		
		// Create membership:
		$entity = new self();
		$entity->data->setId(
			new IKL_Domain_Account_Membership_Key($user, $account)
		);
		
		// Set membership permissions:
		while ($permissionsIterator->valid()) {
			$entity->addPermission($permissionsIterator->current());
			$permissionsIterator->next();
		}
		
		return $entity;
	}
	
  /**
   * @param IKL_Domain_Account_Membership_EDO_Interface $data
   * @return IKL_Domain_Account_Membership_admin
   */
  public static function restore(
  	IKL_Domain_Account_Membership_EDO_Interface $data)
  {
    $entity = new self($data);
    return $entity;
  }
  
  /**
   * Adds a permission to this membership.
   * 
   * @param IKL_Domain_Account_Membership_Permission_Admin $permission
   * @return void
   */
  public function addPermission(
  	IKL_Domain_Account_Membership_Permission_Admin $permission)
  {
  	$this->data->getPermissionList()->add($permission);
  }
  
  /**
   * Removes a permission from this membership. Returns true if permissions
   * were affected (i.e. was found and removed), and false otherwise.
   * 
   * @param IKL_Domain_Account_Membership_Permission_Admin $permission
   * @return void
   */
  public function removePermission(
  	IKL_Domain_Account_Membership_Permission_Admin $permission)
  {
  	$this->data->getPermissionList()->remove($permission);
  }
}
?>