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

require_once 'IKL/Domain/Abstract.php';
require_once 'Expression/Key.php';

/**
 * @access public
 */
class IKL_Domain_Language_Expression
  extends IKL_Domain_Abstract
{
  /**
   * @param IKL_Domain_Language $lang
   * @param IKL_Domain_Language_Expression_Alias $alias
   * @return IKL_Domain_Language_Expression
   */
  public static function create(
    IKL_Domain_Language $lang,
    IKL_Domain_Language_Expression_Alias $alias)
  {
    $entity = new self();
    $entity->setId(
    	new IKL_Domain_Language_Expression_Key($lang, $alias)
    );
    return $entity;
  }
  
  /**
   * @param IKL_Domain_Language_Expression_EDO_Interface $edo
   * @return IKL_Domain_Language_Expression
   */
  public static function restore(
  	IKL_Domain_Language_Expression_EDO_Interface $edo)
  {
    $entity = new self($edo);
    return $entity;
  }
  
  /**
   * @see IKL_Domain_Abstract::invoke()
   */
  public function invoke(IKL_Domain_Language_Expression_EDO_Interface $edo)
  {
  	parent::invoke($edo);
  }
  
  /**
   * @param IKL_Domain_Language_Expression_Key $id
   * @return void
   */
  public function setId(IKL_Domain_Language_Expression_Key $id)
  {
    $this->data->setId($id);
  }
  
  /**
   * Set the language expression string.
   * 
   * @param string $expr
   * @return void
   */
  public function setExpression($expr)
  {
    $this->data->setExpression($expr);
  }
  
  /**
   * Get language expression string.
   * 
   * @return string
   */
  public function getExpression()
  {
    return $this->data->getExpression();
  }
}
?>