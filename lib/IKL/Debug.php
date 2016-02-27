<?php
/**
 *
 *
 * @package IKL
 * @since 2007-07-05
 * @version 2007-07-05
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

/**
 * Debug Class
 * 
 * Main purposes are:
 * - Complement exceptions when those cannot be used (i.e. in destructors,
 *   autoloaders)
 * - Supply a clean way to output debug data.
 */
class IKL_Debug
{
  const MODE_OUTPUT     = 1;
  const MODE_LOG        = 2;
  
  const LEVEL_NEUTRAL   = 1;
  const LEVEL_NOTICE    = 2;
  const LEVEL_CRITICAL  = 3; // Forces system to interrupt (exit).
  
  /**
   * @var string
   */
  private static $logFile;
  
  /**
   * Levels mapper: number-to-name.
   * 
   * @var array
   */
  private static $levels;
  
  /**
   * @var int
   */
  private static $modes;
  
  /**
   *
   * @param string $str
   * @return void
   */
  private static function report($level, $str, $class, $line)
  {
    // Map level number-to-name:
    $levelName = self::$levels[$level];
    
    $message = '# ' . strtoupper($levelName)
             . " on line $line in class $class: $str\n";
    
    if (self::hasMode(self::MODE_OUTPUT)) {
      echo $message;
    } else if (self::hasMode(self::MODE_LOG)) {
      $message = date('[Y-m-d H:i:s] ') . $message;
      @file_put_contents(self::$logFile, $message, FILE_APPEND);
    }
    
    if ($level == self::LEVEL_CRITICAL) {
      exit("\nforced system exit");
    }
  }
  
  /**
   * 
   * @return true
   */
  private static function hasMode($mode)
  {
    return (self::$modes & $mode) > 0;
  }
  
  /**
   * Initiates debug helper.
   * 
   * @return void
   */
  public function init()
  {
    self::$logFile = PROJECT_ROOT . 'data/ikl/debug_output.txt';
    self::$levels = array(
      self::LEVEL_NEUTRAL => 'Message',
      self::LEVEL_NOTICE => 'Notice',
      self::LEVEL_CRITICAL => 'Critical'
    );
  }
  
  /**
   * Activates debug output.
   * 
   * @param int $mode DEBUG_* constants.
   * @return void
   */
  public static function activate($mode)
  {
    if (is_null(self::$logFile)) {
      throw new IKL_Exception('Debug class must be initiated first.');
    }
    self::$modes = (self::$modes | $mode);
  }
  
  /**
   * Neutral message.
   * 
   * @param string $class
   * @param int $line
   * @param string $str
   * @return void
   */
  public static function msg($class, $line, $str)
  {
    self::report(self::LEVEL_NEUTRAL, $str, $class, $line);
  }
  
  /**
   * Notice.
   * 
   * @param string $class
   * @param int $line
   * @param string $str
   * @return void
   */
  public static function notify($class, $line, $str)
  {
    self::report(self::LEVEL_NOTICE, $str, $class, $line);
  }
  
  /**
   * Critical message.
   * 
   * @param string $class
   * @param int $line
   * @param string $str
   * @return void
   */
  public static function critical($class, $line, $str)
  {
    self::report(self::LEVEL_CRITICAL, $str, $class, $line);
  }
}
?>