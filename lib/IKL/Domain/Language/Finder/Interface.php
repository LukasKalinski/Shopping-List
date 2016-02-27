<?php
/**
 *
 *
 * @package IKL
 * @subpackage Domain
 * @since 2007-08-14
 * @version 2007-11-24
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

/**
 * @access public
 */
interface IKL_Domain_Language_Finder_Interface
  extends IKL_Domain_Finder_Interface
{
  /**
   * Finds all available languages.
   * 
   * @return IKL_Domain_List_Interface
   */
  public function findAll();
}
?>