<?php
/**
 *
 *
 * @package IKL
 * @subpackage Domain
 * @since 2007-09-08
 * @version 2007-11-24
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

/**
 * @access public
 */
interface IKL_Domain_Language_Expression_Finder_Interface
  extends IKL_Domain_Finder_Interface
{
  /**
   * Find one language expression by supplying its alias and two languages
   * to try for.
   * 
   * @param IKL_Domain_Language_Expression_Alias $alias
   * @param IKL_Domain_Language $primaryLanguage
   * @param IKL_Domain_Language $secondaryLanguage
   * @return IKL_Domain_Language_Expression
   */
  public function findByAlias(
  	IKL_Domain_Language_Expression_Alias $alias,
  	IKL_Domain_Language $primaryLanguage,
  	IKL_Domain_Language $secondaryLanguage);
}
?>