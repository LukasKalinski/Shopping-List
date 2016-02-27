<?php
/**
 *
 *
 * @package IKL
 * @subpackage Domain
 * @since 2007-08-10
 * @version 2007-11-10
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

require_once 'IKL/Domain/Registry.php';
require_once 'Exception/StringFormat.php';

/**
 * Domain Entity Abstraction Class
 * 
 * @pattern Layer Supertype (Fowler 475)
 * @access private
 */
abstract class IKL_Domain_Abstract
{
  /**
   * @var IKL_Domain_EDO_Interface
   */
  protected $data;
  
  /**
   * Constructor
   * 
   * Constructs a new entity if $edo is null, or restores an existing one
   * otherwise. Assumes $edo is of the right (specific) type.
   * 
   * @param IKL_Domain_EDO_Interface $edo
   * @throws IKL_Domain_Exception if the entity isn't invoked by entity manager
   * 	 before return.
   */
  final protected function __construct(IKL_Domain_EDO_Interface $edo = null)
  {
  	if ($edo) {
  		$this->invoke($edo);
		} else {
    	$this->invokeNew();
		}
		
		// Make sure we have a DDO by now:
		if (!$this->data) {
			throw new IKL_Domain_Exception('entity was not invoked');
		}
  }
  
  /**
   * Invokes this entity by attaching an EDO to it. Multiple calls result
   * in an exception.
   * 
   * IMPORTANT:
   * IT IS REQUIRED THAT THE CHILD CLASSES OVERRIDE THIS METHOD AND CALL IT
   * WHEN TYPE CHECKING HAS BEEN DONE!
   * 
   * @param IKL_Domain_EDO_Interface $edo
   * @throws IKL_Domain_Exception if the entity already is invoked.
   * @return void
   */
  public function invoke(IKL_Domain_EDO_Interface $edo)
  {
  	if ($this->data) {
      throw new IKL_Domain_Exception('entity already invoked');
    }
  	$this->data = $edo;
  }
  
  /**
   * Invokes current entity through entity manager, letting it know that the
   * entity is new. Expects entity manager to call our invoke() method.
   * 
   * @param IKL_Domain_EDO_Interface $edo
   * @throws IKL_Domain_Exception if no DDO is found for current class type.
   * @throws IKL_Domain_Exception if the DDO is of wrong type.
   * @return void
   */
  private function invokeNew()
  {
    // Tell our unknown observer to invoke us:
    IKL_Domain_Registry::instance()->getEntityManager()->invokeNewEntity($this);
  }
  
  /**
   * Change the ID of current entity. By default id changing is disallowed, but
   * this restriction may be overridden in a child class when required.
   * 
   * @param mixed $id
   * @throws IKL_Domain_Exception by default.
   * @return void
   */
  public function setId($id)
  {
    throw new IKL_Domain_Exception('id changing not allowed');
  }
  
  /**
   * Get current ID of current entity.
   * 
   * @return mixed
   */
  public function getId()
  {
    return $this->data->getId();
  }
  
  /**
   * Validation helper function.
   *
   * @param string $propName Name of property being validated.
   * @param string $propValue Value to validate.
   * @param string $pattern The pattern to use for validation.
   * @throws IKL_Domain_Exception_StringFormat
   * @return void
   */
  protected function validateStringPropFormat($propName, $propValue, $pattern)
  {
  	if (!preg_match($pattern, $propValue)) {
			throw new IKL_Domain_Exception_StringFormat(
				$propName, $propValue, $pattern
			);
		}
  }
  
  /**
   * Delete the object (from persistence!).
   * 
   * @return void
   */
  final public function delete()
  {
    $this->data->unlink();
  }
}
?>