<?php
/**
 *
 *
 * @package IKL
 * @subpackage Domain
 * @since 2007-09-08
 * @version 2007-11-03
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

/**
 * @access public
 */
interface IKL_Domain_Language_Expression_Alias_EDO_Interface
	extends IKL_Domain_EDO_Interface
{
	/**
	 * @param string $id
	 * @return void
	 */
	public function setId($id);
	
	/**
	 * @return string
	 */
	public function getId();
	
  /**
   * @param string $name
   * @return void
   */
	public function setName($name);
	
	/**
	 * @return string
	 */
	public function getName();

	/**
	 * @param IKL_Domain_Language_Expression_Alias $parent
	 * @return void
	 */
	public function setParent(IKL_Domain_Language_Expression_Alias $parent);
	
  /**
   * Returns the parent alias.
   * 
   * @return IKL_Domain_Language_Expression_Alias
   */
	public function getParent();
  
  /**
   * @return IKL_Domain_List_Interface
   */
	public function getChildren();
}
?>