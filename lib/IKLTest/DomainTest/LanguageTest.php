<?php
/**
 *
 *
 * @package IKLTest
 * @subpackage DomainTest
 * @since 2007-10-28
 * @version 2007-11-03
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

require_once 'PHPUnit2/Framework.php';

include_once 'IKL/Domain/Language.php';
include_once 'IKL/Domain/Language/Expression.php';
include_once 'IKL/Domain/Language/Expression/Alias.php';

include_once 'Mock/EntityManager.php';
include_once 'Mock/Language/EDO.php';
include_once 'Mock/Language/Expression/EDO.php';
include_once 'Mock/Language/Expression/Alias/EDO.php';

/**
 * Language Module Tester
 * 
 * Entity uniqueness isn't well tested here, since that should be done by the
 * data source testing environment.
 * 
 * @access private
 */
class DomainTest_LanguageTest
  extends PHPUnit2_Framework_TestCase
{
  /**
   * @var IKL_Domain_Language
   */
  private $lang_primary;
  
  /**
   * @var IKL_Domain_Language
   */
  private $lang_secondary;

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
  	
  	// Create languages:
    $this->lang_primary   = IKL_Domain_Language::create('sv');
    $this->lang_secondary = IKL_Domain_Language::create('en');
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
  		IKL_Domain_Language::create('AAA');
  		IKL_Domain_Language::create('AA');
  		IKL_Domain_Language::create('');
  		
  		// Avoid DDO Mock complaining about uniqueness violation:
  		DomainTest_Mock_EDO_Abstract::reset();
  		IKL_Domain_Language::create(null);
		} catch (Exception $e) {
			$this->assertTrue(
				$e instanceof IKL_Domain_Exception_StringFormat,
				'thrown invalid format-exception was of wrong type: ' . get_class($e) .
				', saying: ' . $e->getMessage()
			);
			$thrown = true;
		}
		$this->assertTrue($thrown, 'exception not thrown for invalid language id');
  }
  
  /**
   * @return void
   */
  public function testNestedAliases()
  {
  	// Create a parent alias:
    $parent = IKL_Domain_Language_Expression_Alias::create('pnt');
    
    // Create and add child aliases for the parent alias:
    $child_1 = $parent->createChild('foo');
    $child_2 = $parent->createChild('bar');
    
    // Make sure the children exist:
    $children_it = $parent->getChildrenIterator();
    $this->assertEquals(
    	$children_it->current()->getName(),
    	'foo',
    	'first children alias not found in its parent');
    $children_it->next();
    $this->assertEquals(
    	$children_it->current()->getName(),
    	'bar',
    	'first children alias not found in its parent');
    
    // Make sure paths agree:
    $this->assertEquals($parent->getPath(), 'pnt');
    $this->assertEquals($child_1->getPath(), 'pnt.foo');
    $this->assertEquals($child_2->getPath(), 'pnt.bar');
  }
  
  /**
   * @return void
   */
  public function testExpressionAliasing()
  {
  	$alias_1 = IKL_Domain_Language_Expression_Alias::create('someAlias');
  	$alias_2 = IKL_Domain_Language_Expression_Alias::create('anotherAlias');
  	
    // Associate aliases with a language to form a language expression:
    $expr_1a = IKL_Domain_Language_Expression::create(
    	$this->lang_primary, $alias_1
    );
    $expr_1b = IKL_Domain_Language_Expression::create(
    	$this->lang_secondary, $alias_1
    );
    $expr_1a->setExpression('some expression in swedish');
    $expr_1b->setExpression('some expression in english');
    
    // Make sure the expressions were stored properly (simple test):
    $this->assertEquals(
    	$expr_1a->getExpression(),
    	'some expression in swedish'
    ); 
    $this->assertEquals(
    	$expr_1b->getExpression(),
    	'some expression in english'
    );
    
    // Make sure the ID of a language expression is of proper type:
    $this->assertTrue(
    	$expr_1a->getId() instanceof IKL_Domain_Language_Expression_Key,
    	'invalid id for language expression'
    );
    
    // Make sure the paths of the two "only differ in language" expressions
    // are equal:
    $this->assertEquals(
    	$expr_1a->getId()->getAlias()->getPath(),
    	$expr_1b->getId()->getAlias()->getPath()
    );
  }
}
?>