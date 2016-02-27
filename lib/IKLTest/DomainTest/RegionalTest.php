<?php
/**
 *
 *
 * @package IKLTest
 * @subpackage DomainTest
 * @since 2007-11-03
 * @version 2007-11-03
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

require_once 'PHPUnit2/Framework.php';

include_once 'IKL/Domain/Regional/Country.php';
include_once 'IKL/Domain/Regional/Region.php';
include_once 'IKL/Domain/Regional/City.php';

/**
 * Regional Module Tester
 * 
 * @access private
 */
class DomainTest_RegionalTest
  extends PHPUnit2_Framework_TestCase
{
  /**
   *
   * @return void
   */
  public function setUp()
  {
  	// Reset Mockups:
  	DomainTest_Mock_EDO_Abstract::reset();
  	
  	// General domain setup:
  	IKL_Domain_Registry::instance()->setEntityManager(
  		new DomainTest_EntityManager()
  	);
  }
  
  /**
   *
   * @return void
   */
  public function tearDown()
  {
  }
  
  /**
   *
   * @return void
   */
  public function testMisuse()
  {
  	$thrown = false;
  	try {
  		IKL_Domain_Regional_Country::create('se',  'Sweden', 'Sverige');
  		IKL_Domain_Regional_Country::create('Se',  'Sweden', 'Sverige');
  		IKL_Domain_Regional_Country::create('',    'Sweden', 'Sverige');
  		IKL_Domain_Regional_Country::create('SEE', 'Sweden', 'Sverige');
  		
  		// Avoid DDO Mock complaining about uniqueness violation:
  		DomainTest_Mock_EDO_Abstract::reset();
  		IKL_Domain_Regional_Country::create(null,  'Sweden', 'Sverige');
		} catch (Exception $e) {
			$this->assertTrue(
				$e instanceof IKL_Domain_Exception_StringFormat,
				'thrown invalid format-exception was of wrong type: ' . get_class($e) .
				', saying: ' . $e->getMessage()
			);
			$thrown = true;
		}
		$this->assertTrue($thrown, 'exception not thrown for invalid country id');
  }
  
  /**
   *
   * @return void
   */
  public function testCommonUsage()
  {
  	$country = IKL_Domain_Regional_Country::create('SE', 'Sweden', 'Sverige');
  	
  	// Add some regions to the country:
  	$reg_sthlm 	= $country->createRegion('Stockholms Län');
  	$reg_gbg 		= $country->createRegion('Göteborgs Län');
  	
  	// Make sure the created regions keep a reference to their parent country:
  	$this->assertEquals($reg_sthlm->getCountry()->getId(), $country->getId());
  	$this->assertEquals($reg_gbg->getCountry()->getId(), $country->getId());
  	
  	// Make sure the country contains both regions:
  	$regions_it = $country->getRegionsIterator();
  	$this->assertTrue(
  		$regions_it->current() instanceof IKL_Domain_Regional_Region,
  		'invalid object type returned from regions iterator'
  	);
  	$this->assertEquals($regions_it->current()->getId(), $reg_sthlm->getId());
  	$regions_it->next();
  	$this->assertEquals($regions_it->current()->getId(), $reg_gbg->getId());
  	
  	// Add some cities to one region:
  	$city_sthlm = $reg_sthlm->createCity('Stockholm');
  	$city_vby   = $reg_sthlm->createCity('Vällingby');
  	
  	// Make sure the created cities keep a reference to their parent region:
  	$this->assertEquals($city_sthlm->getRegion()->getId(), $reg_sthlm->getId());
  	$this->assertEquals($city_vby->getRegion()->getId(), $reg_sthlm->getId());
  	
  	// Make sure the region contains both cities:
  	$cities_it = $reg_sthlm->getCitiesIterator();
  	$this->assertTrue(
  		$cities_it->current() instanceof IKL_Domain_Regional_City,
  		'invalid object type returned from cities iterator'
  	);
  	$this->assertEquals($cities_it->current()->getId(), $city_sthlm->getId());
  	$cities_it->next();
  	$this->assertEquals($cities_it->current()->getId(), $city_vby->getId());
  }
}
?>