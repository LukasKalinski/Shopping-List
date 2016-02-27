<?php
/**
 * Application Registry
 *
 * @package IKL.Registry
 * @since 2007-07-02
 * @version 2007-07-06
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

/**
 * Application Registry Class
 * 
 * This registry is, after initiation, read-only.
 */
class IKL_Registry_Application
{
  /**
   * @var IKL_Registry_Application
   */
  private static $instance = null;
  
  /**
   * @var Cylab_Registry_Application
   */
  private $registry;
  
  /**
   * Singleton loader.
   * 
   * @return IKL_Registry_Application
   */
  public static function instance()
  {
    if (is_null(self::$instance)) {
      self::$instance = new self();
    }
    return self::$instance;
  }
  
  /**
   * Constructor
   */
  private function __construct()
  {
    $this->registry = Cylab_Registry_Application::instance();
  }
  
  /**
   * @param string $dsn
   * @return void
   */
  public function setDsn($dsn)
  {
    $this->registry->set('dsn', $dsn);
  }
  
  /**
   * @return string
   */
  public function getDsn()
  {
    return $this->registry->get('dsn');
  }
  
  /**
   * @param string $user
   * @return void
   */
  public function setDbUser($user)
  {
    $this->registry->set('dbuser', $user);
  }
  
  /**
   * @return string
   */
  public function getDbUser()
  {
    return $this->registry->get('dbuser');
  }
  
  /**
   * @param string $password
   * @return void
   */
  public function setDbPassword($password)
  {
    $this->registry->set('dbpassword', $password);
  }
  
  /**
   * @return string
   */
  public function getDbPassword()
  {
    return $this->registry->get('dbpassword');
  }
}
?>