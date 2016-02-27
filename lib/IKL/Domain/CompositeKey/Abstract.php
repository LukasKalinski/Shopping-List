<?php
/**
 *
 *
 * @package IKL
 * @subpackage Domain
 * @since 2007-11-17
 * @version 2007-11-17
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

/**
 * @access private
 */
abstract class IKL_Domain_CompositeKey_Abstract
{
	/**
	 * Get unique string representation of the key.
	 * 
	 * @return string
	 */
	abstract public function __toString();
}
?>