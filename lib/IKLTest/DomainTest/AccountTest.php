<?php
/**
 *
 *
 * @package IKLTest
 * @subpackage DomainTest
 * @since 2007-10-28
 * @version 2007-11-24
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

require_once 'PHPUnit2/Framework.php';

include_once 'IKL/Domain/Account/Abstract.php';
include_once 'IKL/Domain/Account/Sponsor.php';
include_once 'IKL/Domain/Account/Household.php';
include_once 'IKL/Domain/Account/Admin.php';
include_once 'IKL/Domain/Account/User.php';

/**
 * @access private
 */
class DomainTest_AccountTest
  extends PHPUnit2_Framework_TestCase
{
	/**
	 * Invalid account and user names.
	 * 
	 * @var array
	 */
	private $invalidNames = array('A', '1A', 'AA?', '');
	
	/**
	 * Invalid user gender options.
	 * 
	 * @var array
	 */
	private $invalidGenders = array('m', 'f', '', 'male', 'female', 'foobar');
	
	/**
	 * Invalid dates.
	 * 
	 * @var array
	 */
	private $invalidDates = array('20000230', '20010229');
	
  /**
   * @var IKL_Domain_Account_Admin
   */
  private $acc_admin;
  
  /**
   * @var IKL_Domain_Account_Household
   */
  private $acc_household;
  
  /**
   * @var IKL_Domain_Account_Sponsor
   */
  private $acc_sponsor;
  
  /**
   * @var IKL_Domain_Account_User
   */
  private $user_1;
  
  /**
   * @var IKL_Domain_Account_User
   */
  private $user_2;
  
  /**
   *
   * @return void
   */
  public function setUp()
  {
  	// Reset Mockups:
  	DomainTest_Mock_EDO_Abstract::reset();
  	
  	// General domain layer setup:
  	IKL_Domain_Registry::instance()->setEntityManager(
  		new DomainTest_EntityManager()
  	);
  	
//    $this->acc_admin      = IKL_Domain_Account_Admin::create('theAdmin');
//    $this->acc_household  = IKL_Domain_Account_Household::create('');
//    $this->acc_sponsor    = IKL_Domain_Account_Sponsor::create();
//    $this->user_1         = IKL_Domain_Account_User::create();
//    $this->user_2         = IKL_Domain_Account_User::create();
  }
  
  /**
   *
   * @return void
   */
  public function tearDown()
  {
  }
  
  /**
   * @return void
   */
  public function testNameValidation()
  {
  	foreach ($this->invalidNames as $name) {
  		
  		// Test: Admin account name validation.
  		$thrown = false;
  		try {
  			IKL_Domain_Account_Admin::create($name);
			} catch (IKL_Domain_Exception_StringFormat $e) {
				$thrown = true;
			}
			$this->assertTrue(
				$thrown,
				'exception not thrown when supplying invalid admin account name'
			);
			
			// Test: Household account name validation.
			$thrown = false;
			try {
  			IKL_Domain_Account_Household::create($name);
			} catch (IKL_Domain_Exception_StringFormat $e) {
				$thrown = true;
			}
			$this->assertTrue(
				$thrown,
				'exception not thrown when supplying invalid household account name'
			);
			
			// Test: Sponsor account name validation.
			$thrown = false;
			try {
  			IKL_Domain_Account_Sponsor::create($name);
			} catch (IKL_Domain_Exception_StringFormat $e) {
				$thrown = true;
			}
			$this->assertTrue(
				$thrown,
				'exception not thrown when supplying invalid sponsor account name'
			);
			
			// Test: Account user name validation.
			$thrown = false;
			try {
  			IKL_Domain_Account_User::create(
  				$name,
  				'M',
  				'19830928',
  				'foo@bar.com',
  				IKL_Domain_Account_Household::create('test_account'));
			} catch (IKL_Domain_Exception_StringFormat $e) {
				$thrown = true;
			}
			$this->assertTrue(
				$thrown,
				'exception not thrown when supplying invalid account user name'
			);
		}
  }
  
  /**
   * @return void
   */
  public function testUserGenderValidation()
  {
  	foreach ($this->invalidGenders as $gender) {
			$thrown = false;
			try {
  			IKL_Domain_Account_User::create(
  				'test_user',
  				$gender,
  				'19830928',
  				'foo@bar.com',
  				IKL_Domain_Account_Household::create('test_account'));
			} catch (IKL_Domain_Exception_StringFormat $e) {
				$thrown = true;
			}
			$this->assertTrue(
				$thrown,
				'exception not thrown when supplying invalid account user gender'
			);
		}
  }
  
  /**
   * @return void
   */
  public function testUserDateOfBirthValidation()
  {
  	foreach ($this->invalidDates as $date) {
			$thrown = false;
			try {
  			IKL_Domain_Account_User::create(
  				'test_user',
  				'M',
  				$date,
  				'foo@bar.com',
  				IKL_Domain_Account_Household::create('test_account'));
			} catch (IKL_Domain_Exception_StringFormat $e) {
				$thrown = true;
			}
			$this->assertTrue(
				$thrown,
				'exception not thrown when supplying invalid account user date of birth'
			);
		}
  }
  
  /**
   * @return void
   */
  public function testNoExplicitUserCreation() // ???
  {
  	foreach ($this->invalidDates as $date) {
			$thrown = false;
			try {
  			IKL_Domain_Account_User::create(
  				'test_user',
  				'M',
  				$date,
  				'foo@bar.com',
  				IKL_Domain_Account_Household::create('test_account'));
			} catch (IKL_Domain_Exception $e) {
				$thrown = true;
			}
			$this->assertTrue(
				$thrown,
				'exception not thrown when creating user explicitly'
			);
		}
  }
}
?>