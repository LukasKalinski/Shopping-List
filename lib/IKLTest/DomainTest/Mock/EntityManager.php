<?php
/**
 *
 *
 * @package IKLTest
 * @subpackage DomainTest
 * @since 2007-10-28
 * @version 2007-11-17
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

require_once 'IKL/Domain/EntityManager/Interface.php';

include_once 'Language/EDO.php';
include_once 'Language/Expression/EDO.php';
include_once 'Language/Expression/Alias/EDO.php';

include_once 'Regional/Country/EDO.php';
include_once 'Regional/Region/EDO.php';
include_once 'Regional/City/EDO.php';

include_once 'Account/Admin/EDO.php';
include_once 'Account/Household/EDO.php';
include_once 'Account/Sponsor/EDO.php';
include_once 'Account/User/EDO.php';

/**
 * Entity Manager Mock-Up
 * 
 * Does nothing but supplying a correct EDO to the invoked entity. An UUID will
 * be generated for those EDOs/Entities that do not set their own one.
 * 
 * @access private
 */
class DomainTest_EntityManager
	implements IKL_Domain_EntityManager_Interface
{
	/**
	 * @var int
	 */
	private $counter = 1;
	
	/**
	 * @var IKL_Domain_Abstract[]
	 */
	private $entities = array();
	
	/**
	 * @see IKL_Domain_EntityManager_Interface::invokeNewEntity()
   * @return void
   */
  public function invokeNewEntity(IKL_Domain_Abstract $entity)
  {
  	// Create an EDO for the entity and simulate UUID generation (when id is a
  	// UUID), which in reality will be done by a mapper:
  	switch (get_class($entity)) {
  		/**
  		 * Language Module
  		 */
  		case 'IKL_Domain_Language':
					$edo = new DomainTest_Mock_Language_EDO();
  			break;
  		case 'IKL_Domain_Language_Expression':
  				$edo = new DomainTest_Mock_Language_Expression_EDO();
  			break;
  		case 'IKL_Domain_Language_Expression_Alias':
  				$edo = new DomainTest_Mock_Language_Expression_Alias_EDO();
					$edo->setId($this->generateUUId());
  			break;
  		
  		/**
  		 * Regional Module
  		 */
  		case 'IKL_Domain_Regional_Country':
  			$edo = new DomainTest_Mock_Regional_Country_EDO();
  			break;
  		case 'IKL_Domain_Regional_Region':
  			$edo = new DomainTest_Mock_Regional_Region_EDO();
				$edo->setId($this->counter++);
  			break;
  		case 'IKL_Domain_Regional_City':
  			$edo = new DomainTest_Mock_Regional_City_EDO();
				$edo->setId($this->counter++);
  			break;
  		
  		/**
  		 * Account Module
  		 */
  		case 'IKL_Domain_Account_Admin':
  				$edo = new DomainTest_Mock_Account_Admin_EDO();
					$edo->setId($this->generateUUId());
  			break;
  		case 'IKL_Domain_Account_Sponsor':
  				$edo = new DomainTest_Mock_Account_Sponsor_EDO();
					$edo->setId($this->generateUUId());
  			break;
  		case 'IKL_Domain_Account_Household':
  				$edo = new DomainTest_Mock_Account_Household_EDO();
					$edo->setId($this->generateUUId());
  			break;
  		case 'IKL_Domain_Account_User':
  				$edo = new DomainTest_Mock_Account_User_EDO();
					$edo->setId($this->generateUUId());
  			break;
  		case 'IKL_Domain_Account_LoginSession':
  				$edo = new DomainTest_Mock_Account_LoginSession_EDO();
					$edo->setId($this->generateUUId());
  			break;
  		
  		default:
  			throw new IKLTest_Exception(
  				'unknown entity type: ' . get_class($entity)
  			);
		}
		
		$entity->invoke($edo);
	}
	
	/**
	 * @return string
	 */
	private function generateUUId()
	{
		$uuid = md5($this->counter++);
		$uuid = substr($uuid,0,8)		. '-'
					.	substr($uuid,8,4)		. '-'
					.	substr($uuid,12,4)	. '-'
					.	substr($uuid,16,4)	. '-'
					.	substr($uuid,20,12);
		return $uuid;
	}
}
?>