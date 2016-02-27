<?php
/**
 *
 *
 * @package IKL
 * @subpackage Domain
 * @since 2007-11-10
 * @version 2007-11-10
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

require_once 'IKL/Domain/Exception.php';

/**
 * The exception that is thrown when the format of an argument does not meet
 * the parameter specifications of the invoked method.
 * 
 * @access public
 */
class IKL_Domain_Exception_StringFormat extends IKL_Domain_Exception
{
	/**
	 * Constructor
	 * 
	 * @param string $propName The property whos format failed.
	 * @param mixed $was What the format was.
	 * @param string $shouldBe What the format should be (may be expressed as
	 * 	 a pattern).
	 */
	public function __construct($propName, $was, $shouldBe)
	{
		parent::__construct(
			"invalid format of '$propName': was '$was', should be '$shouldBe'"
		);
	}
}
?>