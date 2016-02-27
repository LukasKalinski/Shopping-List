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
interface IKL_Domain_Language_Expression_EDO_Interface
  extends IKL_Domain_EDO_Interface
{
	/**
	 * @param IKL_Domain_Language_Expression_Key $id
	 * @return void
	 */
	public function setId(IKL_Domain_Language_Expression_Key $id);
	
	/**
	 * @return IKL_Domain_Language_Expression_Key
	 */
	public function getId();
	
  /**
   * @param string $expr The language expression string.
   * @return void
   */
  public function setExpression($expr);
  
  /**
   * @return string
   */
  public function getExpression();
}
?>