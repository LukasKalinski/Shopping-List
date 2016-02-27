<?php
/**
 *
 *
 * @package IKL
 * @subpackage Domain
 * @since 2007-09-08
 * @version 2007-11-17
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

require_once 'IKL/Domain/CompositeKey/Abstract.php';

/**
 * @access private
 * @pattern Value Object
 */
class IKL_Domain_Language_Expression_Key
	extends IKL_Domain_CompositeKey_Abstract
{
  /**
   * @var IKL_Domain_Language
   */
  private $lang;
  
  /**
   * @var IKL_Domain_Language_Expression_Alias
   */
  private $alias;
  
  /**
   * @param IKL_Domain_Language $lang
   * @param IKL_Domain_Language_Expression_Alias $alias
   */
  public function __construct(
    IKL_Domain_Language $lang,
    IKL_Domain_Language_Expression_Alias $alias)
  {
    $this->lang = $lang;
    $this->alias = $alias;
  }
  
  /**
   * @return IKL_Domain_Language
   */
  public function getLanguage()
  {
    return $this->lang;
  }
  
  /**
   * @return IKL_Domain_Language_Expression_Alias
   */
  public function getAlias()
  {
    return $this->alias;
  }
  
  /**
	 * @see IKL_Domain_CompositeKey_Abstract::__toString()
   */
  public function __toString()
  {
  	return ((string) $this->lang->getId())
  				 . ':' .
  				 ((string) $this->alias->getId());
  }
}
?>