<?php
/**
 *
 *
 * @package IKL
 * @subpackage Domain
 * @since 2007-08-14
 * @version 2007-11-24
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

require_once 'IKL/Domain/Abstract.php';

/**
 * @access public
 */
class IKL_Domain_Language
  extends IKL_Domain_Abstract
{
	/**
	 * @var string
	 */
	private static $idPattern = '/^[a-z]{2}$/';
	
  /**
   * @see IKL_Domain_Abstract::create()
   * @param string $id Language code according to ISO 639-1
   *   (2 letters, lower case).
   * @throws IKL_Domain_Exception_StringFormat if $id is not formatted properly.
   * @return IKL_Domain_Language
   */
  public static function create($id)
  {
    $entity = new self();
    $entity->setId($id);
    return $entity;
  }
  
  /**
   * @param IKL_Domain_Language_EDO_Interface $edo
   * @return IKL_Domain_Language_Expression
   */
  public static function restore(IKL_Domain_Language_EDO_Interface $edo)
  {
    $entity = new self($edo);
    return $entity;
  }
  
  /**
   * @see IKL_Domain_Abstract::invoke()
   */
  public function invoke(IKL_Domain_Language_EDO_Interface $edo)
  {
  	parent::invoke($edo);
  }
  
  /**
   * Set ID of current language entity.
   * 
   * @param string $id Language code according to ISO 639-1
   *   (2 letters, lower case).
   * @throws IKL_Domain_Exception_StringFormat if $id is not formatted properly.
   * @return void
   */
  public function setId($id)
  {
    $this->validateStringPropFormat('id', $id, self::$idPattern);
    $this->data->setId($id);
  }
  
  /**
   * @param string $name
   * @return void
   */
  public function setNativeName($name)
  {
    $this->data->setNativeName($name);
  }
  
  /**
   * Get the name in current language.
   * 
   * @return string
   */
  public function getNativeName()
  {
    return $this->data->getNativeName();
  }
}
?>