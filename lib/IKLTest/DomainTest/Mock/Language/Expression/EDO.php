<?php
/**
 *
 *
 * @package IKLTest
 * @subpackage DomainTest
 * @since 2007-10-28
 * @version 2007-11-03
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

require_once 'IKLTest/DomainTest/Mock/EDO/Abstract.php';
require_once 'IKL/Domain/Language/Expression/EDO/Interface.php';

/**
 * @access private
 */
class DomainTest_Mock_Language_Expression_EDO
	extends DomainTest_Mock_EDO_Abstract
	implements IKL_Domain_Language_Expression_EDO_Interface
{
	/**
   * @param IKL_Domain_Language_Expression_Key $key
   * @param string $id
   * @return void
   */
  public function setId(IKL_Domain_Language_Expression_Key $id)
  {
  	$this->set(self::ID_FIELD, $id);
	}
  
	/**
	 * @return IKL_Domain_Language_Expression_Key
	 */
	public function getId()
	{
		return $this->get(self::ID_FIELD);
	}
	
  /**
   * @param string $expr The language expression string.
   * @return void
   */
  public function setExpression($expr)
  {
  	$this->set('expr', $expr);
	}
  
  /**
   * @return string
   */
  public function getExpression()
  {
  	return $this->get('expr');
	}
}
?>