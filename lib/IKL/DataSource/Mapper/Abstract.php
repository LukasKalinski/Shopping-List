<?php
/**
 *
 *
 * @package IKL
 * @subpackage DataSource
 * @since 2007-08-14
 * @version 2007-08-14
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

/**
 * @access private
 */
abstract class IKL_DataSource_Mapper_Abstract
{
  /**
   *
   * @return void
   */
  public function insert()
  {
    
  }
  
  /**
   *
   * @return void
   */
  public function update()
  {
    
  }
  
  /**
   *
   * @return void
   */
  public function delete()
  {
    
  }
  
  /**
   * Loads a ghost DTO with its data.
   * 
   * @param IKL_DataSource_Abstract $do
   * @return void
   */
  abstract public function load(IKL_Domain_Abstract $do);
}
?>