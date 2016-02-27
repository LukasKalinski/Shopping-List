<?php
/**
 *
 *
 * @package IKL.Registry.Application.Importer
 * @since 2007-07-06
 * @version 2007-07-08
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

/**
 * Application Registry Importer
 */
class IKL_Registry_Application_Importer_Config
  extends Cylab_Registry_Application_Importer_Abstract
{
  /**
   * @see Cylab_Registry_Application_Importer_Interface::import()
   */
  public function import($xmlObj)
  {
    $appreg = IKL_Registry_Application::instance();
    
    // Setup DB properties:
    $appreg->setDsn((string) $xmlObj->db->dsn);
    $appreg->setDbUser((string) $xmlObj->db->user);
    $appreg->setDbPassword((string) $xmlObj->db->password);
  }
}
?>