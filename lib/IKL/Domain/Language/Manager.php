<?php
/**
 *
 *
 * @package IKL
 * @subpackage Domain
 * @since 2007-11-24
 * @version 2007-11-24
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

require_once 'IKL/Domain/Registry.php';

/**
 * @access protected
 * @pattern service
 */
class IKL_Domain_Language_Manager
{
	/**
	 * @param IKL_Domain_Language_Expression_Alias $alias
	 * @return IKL_Domain_Language_Expression
	 */
	public static function interpretAlias(
		IKL_Domain_Language_Expression_Alias $alias)
	{
		$reg = IKL_Domain_Registry::instance();
		$finder = $reg->getFinder('Language_Expression_Finder_Interface');
		$expr = $finder->findByAlias(
			$alias,
			$reg->getPrimaryLanguage(),
			$reg->getSecondaryLanguage()
		);
		return $expr;
	}
}
?>