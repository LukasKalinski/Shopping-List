<?php
/**
 * IKL UnitTest Runner
 *
 * @package IKLTest
 * @since 2007-10-28
 * @version 2007-11-03
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

set_include_path(
	get_include_path() .
		PATH_SEPARATOR .
			realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..'));

require_once 'PHPUnitTestAll.php';

//include_once 'IKLTest/Exception.php';
//include_once 'IKLTest/DomainTest/EntityManager.php';

/**
 * @access private
 */
class AllTests extends PHPUnitTestAll { }

AllTests::setFromFile(__FILE__);
AllTests::run();
?>