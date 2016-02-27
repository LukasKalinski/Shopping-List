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
class IKL_Domain_Account_Membership_Permission_Household
	extends IKL_Domain_Account_Membership_Permission_Abstract
{
	/**
	 * Creates a new household account permission.
	 * 
	 * @param string $name
	 * @param IKL_Domain_Language_Expression_Alias $label
	 * @param IKL_Domain_Language_Expression_Alias $description
	 * @return IKL_Domain_Account_Membership_Permission_Household
	 */
	public static function create(
		$name,
		IKL_Domain_Language_Expression_Alias $label,
		IKL_Domain_Language_Expression_Alias $description)
	{
		$entity = new self();
		$entity->setName($name);
		$entity->setLabelAlias($label);
		$entity->setDescAlias($description);
		return $entity;
	}
	
  /**
   * Restore an existing household account membership permission.
   * 
   * @param IKL_Domain_Account_Membership_Permission_EDO_Interface $data
   * @return IKL_Domain_Account_Admin
   */
  public static function restore(
  	IKL_Domain_Account_Membership_Permission_EDO_Interface $data)
  {
    $entity = new self($data);
    return $entity;
  }
}
?>