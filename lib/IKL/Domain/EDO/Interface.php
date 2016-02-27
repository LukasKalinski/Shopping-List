<?php
/**
 *
 *
 * @package IKL
 * @subpackage Domain
 * @since 2007-08-22
 * @version 2007-11-03
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

/**
 * Supertype for all DDO (Domain Data Object) interfaces in the Domain Layer.
 * 
 * @access public
 */
interface IKL_Domain_EDO_Interface
{
  /**
   * Unlinks a DDO from an entity, meaning the entity is removed from
   * persistence.
   * 
   * @return void
   */
  public function unlink();
}
?>