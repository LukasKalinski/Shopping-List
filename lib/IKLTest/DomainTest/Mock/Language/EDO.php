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

require_once 'IKL/Domain/Language/EDO/Interface.php';
require_once 'IKLTest/DomainTest/Mock/EDO/Abstract.php';

/**
 * @access private
 */
class DomainTest_Mock_Language_EDO
	extends DomainTest_Mock_EDO_Abstract
	implements IKL_Domain_Language_EDO_Interface
{
	/**
	 * @param string $id
	 * @return void
	 */
	public function setId($id)
	{
		$this->set(self::ID_FIELD, $id);
	}
	
	/**
	 * @return string
	 */
	public function getId()
	{
		return $this->get(self::ID_FIELD);
	}
	
	/**
   * @param string $name
   * @return void
   */
  public function setNativeName($name)
  {
  	$this->set('name', $name);
	}

  /**
   * @return string
   */
  public function getNativeName()
  {
  	return $this->get('name');
	}
}
?>