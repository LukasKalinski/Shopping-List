<?php
/**
 *
 *
 * @package IKL
 * @since 2007-07-06
 * @version 2007-07-08
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

/**
 * IKL Main Class
 */
class IKL
{
  /**
   * @var
   */
  private static $appRoot;
  
  /**
   * Config file relative to application root.
   * 
   * @var string
   */
  private static $configFile = 'data/ikl/config.xml';
  
  /**
   *
   * @return void
   */
  private static function init()
  {
    // Initiate framework:
    require 'Cylab.php';
    Cylab::init();
    
    // Setup paths:
    self::$appRoot = realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR.'..')
                   . DIRECTORY_SEPARATOR;
    
    // Setup framework:
    Cylab::setInternalTempDir(self::$appRoot . 'data/ikl/cyfram/');
    Cylab_AutoLoader::addNamespace('IKL');
  }
  
  /**
   * Initiates IKL environment.
   * 
   * @return void
   */
  public static function start()
  {
    self::init();
    
//    $cfgFile = self::$appRoot . self::$configFile;
//    $importManager = new Cylab_Registry_Application_ImportManager($cfgFile);
//    $iklConfigImporter = new IKL_Registry_Application_Importer_Config();
//    $importManager->addImporter($iklConfigImporter);
//    Cylab_Controller_Front::init($importManager);
    $frontController = Cylab_Controller_Front::instance();
//    $frontController->
  }
}
?>