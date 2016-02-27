<?php
/**
 *
 *
 * @package IKL
 * @subpackage Domain
 * @since 2007-08-14
 * @version 2007-09-08
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

/**
 * @access public
 */
interface IKL_Domain_Regional_Finder_Interface
  extends IKL_Domain_Finder_Interface
{
  /**
   * @return IKL_Domain_List_Interface
   */
  public function findAllCountries();
  
  /**
   * @return IKL_Domain_List_Interface
   */
  public function findAllRegions();
  
  /**
   * @return IKL_Domain_List_Interface
   */
  public function findAllCities();
  
  /**
   * @return IKL_Domain_List_Interface
   */
  public function findContryRegions($countryId);
  
  /**
   * @return IKL_Domain_List_Interface
   */
  public function findRegionCities($regionId);
}
?>