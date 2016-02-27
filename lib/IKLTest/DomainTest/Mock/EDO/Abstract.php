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

require_once 'IKL/Domain/EDO/Interface.php';

require_once 'IKLTest/Exception.php';

/**
 * @access private
 */
class DomainTest_Mock_EDO_Abstract
	implements IKL_Domain_EDO_Interface
{
	const ID_FIELD = 'key';
	
	/**
	 * Keeps track of which DDOs had which ID.
	 * 
	 * @var array
	 */
	private static $used_ids = array();
	
	/**
	 * DDO variable registry.
	 * 
	 * @var array
	 */
	private $vars = array();
	
	/**
	 * Resets the used_ids tracker.
	 * 
	 * @return void
	 */
	public static function reset()
	{
		self::$used_ids = array();
	}
	
	/**
	 *
	 * @param string $key
	 * @param mixed $value
	 * @return void
	 */
	protected function set($key, $value)
	{
		switch ($key) {
			case self::ID_FIELD:
				// Make sure there is no DDO with the same key/id already:
				$class = get_class($this);
				
				if ($value instanceof IKL_Domain_Abstract) {
					$id = (string) $value->getId();
				} else {
					$id = (string) $value;
				}
				
				if (isset(self::$used_ids[$class][$id])) {
					throw new IKLTest_Exception('id uniqueness violation');
				}
				
				self::$used_ids[$class][$id] = true;
				break;
		}
		
		$this->vars[$key] = $value;
	}
	
	/**
	 * 
	 * @param string $key
	 * @return mixed
	 */
	protected function get($key)
	{
		return (isset($this->vars[$key]) ? $this->vars[$key] : null);
	}
	
	/**
	 * @see IKL_Domain_EDO_Interface::unlink()
	 */
	public function unlink()
	{
	}
}
?>