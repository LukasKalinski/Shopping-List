<?php
/**
 *
 *
 * @package IKL
 * @subpackage Domain
 * @since 2007-08-26
 * @version 2007-09-08
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

/**
 * @access public
 */
interface IKL_Domain_Finder_Interface
{
  /**
   * Finds a domain object by its ID.
   * 
   * @param mixed $id
   * @return IKL_Domain_Finder_Interface
   */
  public function find($id);
}
?>