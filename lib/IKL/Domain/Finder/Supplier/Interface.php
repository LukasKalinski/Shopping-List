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
 * Interface for supplying domain object finders.
 * 
 * @access public
 */
interface IKL_Domain_Finder_Supplier_Interface
{
  /**
   * Returns a finder associated with the supplied domain class name.
   * 
   * @param $domainClassName
   * @return object
   */
  public function getFinder($domainClassName);
}
?>