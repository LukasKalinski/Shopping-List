<?php
/**
 *
 *
 * @package IKL
 * @subpackage Domain
 * @since 2007-08-26
 * @version 2007-11-03
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

/**
 * Interface for an external Unit of Work class.
 * 
 * @access public
 */
interface IKL_Domain_EntityManager_Interface
{
  /**
   * Builds and returns an DDO for specified entity.
   * 
   * @param IKL_Domain_Abstract $entity
   * @return void
   */
  public function invokeNewEntity(IKL_Domain_Abstract $entity);
}
?>