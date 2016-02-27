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
class IKL_Domain_Language_Expression_Alias
  extends IKL_Domain_Abstract
{
  const PATH_SEPARATOR = '.';
  
  /**
   * Create a new alias entity in the global scope.
   * 
   * @param string $name
   * @return IKL_Domain_Language_Expression_Alias
   */
  public static function create($name)
  {
    $entity = new self();
    $entity->setName($name);
    return $entity;
  }
	
  /**
   * @param IKL_Domain_Language_Expression_Alias_EDO_Interface $edo
   * @return IKL_Domain_Language_Expression
   */
  public static function restore(
  	IKL_Domain_Language_Expression_Alias_EDO_Interface $edo)
  {
    $entity = new self($edo);
    return $entity;
  }
  
  /**
   * @see IKL_Domain_Abstract::invoke()
   */
  public function invoke(
  	IKL_Domain_Language_Expression_Alias_EDO_Interface $edo)
  {
  	parent::invoke($edo);
  }
  
  /**
   * Set parent of this alias entity.
   * 
   * @param IKL_Domain_Language_Expression_Alias $parent
   * @return void
   */
  private function setParent(IKL_Domain_Language_Expression_Alias $parent)
  {
  	$this->data->setParent($parent);
  }
  
  /**
   * Return parent of this alias entity.
   * 
   * @return IKL_Domain_Language_Expression_Alias or null
   */
  private function getParent()
  {
  	return $this->data->getParent();
  }
  
  /**
   * @param string $name
   * @return void
   */
  public function setName($name)
  {
    $this->data->setName($name);
  }
  
  /**
   * @return string
   */
  public function getName()
  {
    return $this->data->getName();
  }
  
  /**
   * @return Iterator
   */
  public function getChildrenIterator()
  {
    return $this->data->getChildren()->getIterator();
  }
  
  /**
   * @return string
   */
  public function getPath()
  {
  	$path = '';
  	if ($this->getParent()) {
  		$path = $this->getParent()->getPath() . self::PATH_SEPARATOR;
		}
    return $path . $this->getName();
  }
  
  /**
	 * Creates a new alias in the scope of the current one (i.e. making it
   * have the current alias as its parent).
   * 
   * @param string $aliasName
   * @return void
   */
  public function createChild($aliasName)
  {
  	$cAlias = new self();
  	$cAlias->setParent($this);
  	$cAlias->setName($aliasName);
  	$this->data->getChildren()->add($cAlias);
  	return $cAlias;
  }
  
  /**
   * Adds a child to the current alias entity. If the child alias already
   * has a parent, it will be replaced with the current entity.
   * 
   * @param IKL_Domain_Language_Expression_Alias $cAlias
   * @return void
   */
  public function addChild(IKL_Domain_Language_Expression_Alias $cAlias)
  {
  	$cAlias->setParent($this);
  	$this->data->getChildren()->add($cAlias);
  }
}
?>