<?php
/**
 * Abstract Command
 *
 * @package IKL.Command
 * @since 2007-07-04
 * @version 2007-07-05
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

/**
 * Abstract Command Class
 */
abstract class IKL_Command_Abstract
{
  const DEFAULT_COMMAND = 'Default';
  
  const CMD_DEFAULT = 0;
  const CMD_OK = 1;
  const CMD_ERROR = 2;
  const CMD_INSUFFICIENT_DATA = 3;
  
  /**
   * Additional commands to execute.
   * 
   * @var array
   */
  private $commands = array();
  
  /**
   * Resolves status number from a status string. Returns status number or null
   * if the status string was unknown.
   * 
   * @param string $statusString Status name string.
   * @return int
   */
  public static function resolveStatus($statusString)
  {
    $statusConst = "self::$statusString";
    if (defined($statusConst)) {
      return constant($statusConst);
    } else {
      return null;
    }
  }
  
  /**
   * Constructor
   */
  final public function __construct()
  {
  }
  
  /**
   *
   * @param IKL_Controller_Request $request
   * @return void
   */
  final public function execute(IKL_Controller_Request $request)
  {
    $this->doExecute($request);
  }
  
  /**
   *
   * @param IKL_Controller_Request $request
   * @return void
   */
  abstract protected function doExecute(IKL_Controller_Request $request);
}
?>