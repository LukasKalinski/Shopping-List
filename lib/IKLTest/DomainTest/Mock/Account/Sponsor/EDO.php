<?php
/**
 *
 *
 * @package IKLTest
 * @subpackage Domain
 * @since 2007-11-17
 * @version 2007-11-24
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

require_once 'IKLTest/DomainTest/Mock/EDO/Abstract.php';
require_once 'IKL/Domain/Account/Sponsor/EDO/Interface.php';

/**
 * @access private
 */
class DomainTest_Mock_Account_Sponsor_EDO
	extends DomainTest_Mock_EDO_Abstract
	implements IKL_Domain_Account_Sponsor_EDO_Interface
{
	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->set('creation_date', date('Ymd'));
	}
	
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
  public function setName($name)
  {
  	$this->set('name', $name);
	}
  
  /**
   * @return string
   */
  public function getName()
  {
  	return $this->get('name');
	}
  
	/**
	 * @return string
	 */
	public function getCreationDate()
	{
		return $this->get('creation_date');
	}
}
?>