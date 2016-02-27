<?php
/**
 *
 *
 * @package IKL
 * @subpackage Domain
 * @since 2007-09-08
 * @version 2007-09-08
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

/**
 * @access public
 */
interface IKL_Domain_Language_Expression_Alias_Finder_Interface
  extends IKL_Domain_Finder_Interface
{
  /**
   * Find <em>one</em> alias by its path (note that the path is unique).
   * 
   * @param string $path
   * @return IKL_Domain_Language_Expression_Alias
   */
  public function findByPath($path);
}
?>