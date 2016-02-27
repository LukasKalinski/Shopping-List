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

require_once 'IKL/Domain/Language/Expression/Alias/EDO/Interface.php';
require_once 'IKL/Domain/List.php';

require_once 'IKLTest/DomainTest/Mock/EDO/Abstract.php';

/**
 * @access private
 */
class DomainTest_Mock_Language_Expression_Alias_EDO
	extends DomainTest_Mock_EDO_Abstract
	implements IKL_Domain_Language_Expression_Alias_EDO_Interface
{
	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->set('children', new IKL_Domain_List('Language_Expression_Alias'));
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
	 * @param IKL_Domain_Language_Expression_Alias $parent
	 * @return void
	 */
	public function setParent(IKL_Domain_Language_Expression_Alias $parent)
	{
		$this->set('parent', $parent);
	}
	
  /**
   * Returns the parent alias.
   * 
   * @return IKL_Domain_Language_Expression_Alias
   */
	public function getParent()
	{
		return $this->get('parent');
	}
  
  /**
   * @return IKL_Domain_List_Interface
   */
	public function getChildren()
	{
		return $this->get('children');
	}
}
?>