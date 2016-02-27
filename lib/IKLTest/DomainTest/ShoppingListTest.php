<?php
/**
 *
 *
 * @package IKL
 * @subpackage UnitTest
 * @since 2007-10-28
 * @version 2007-10-28
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

require_once 'PHPUnit2/Framework.php';

include_once 'IKL/Domain/ShoppingList/Abstract.php';
include_once 'IKL/Domain/ShoppingList/Active.php';
include_once 'IKL/Domain/ShoppingList/Saved.php';

/**
 * @access private
 */
class DomainTest_ShoppingListTest
  extends PHPUnit2_Framework_TestCase
{
  /**
   * @var IKL_Domain_ShoppingList_Active
   */
  private $sl_active;
  
  /**
   * @var IKL_Domain_ShoppingList_Saved
   */
  private $sl_saved;
  
  /**
   *
   * @return void
   */
  public function setUp()
  {
//    $this->sl_active = IKL_Domain_ShoppingList_Active::create();
//    $this->sl_saved  = IKL_Domain_ShoppingList_Saved::create();
  }
  
  /**
   *
   * @return void
   */
  public function tearDown()
  {
  }
  
  /**
   * Test addition of items to an active list.
   * 
   * @return void
   */
  public function testActiveAddItem()
  {
    
  }
  
  /**
   * Test addition of items to a saved list.
   * 
   * @return void
   */
  public function testSavedAddItem()
  {
    
  }
  
  /**
   * Test deletion of items from an active list.
   * 
   * @return void
   */
  public function testActiveDeleteItem()
  {
  
  }
  
  /**
   * Test deletion of items from a saved list.
   * 
   * @return void
   */
  public function testSavedDeleteItem()
  {
  
  }
  
  /**
   * Test import of a saved list to an active list.
   * 
   * @return void
   */
  public function testSavedImportToActive()
  {
  
  }
  
  /**
   * Test saving of an active list.
   * 
   * @return void
   */
  public function testActiveSave()
  {
  
  }
}
?>