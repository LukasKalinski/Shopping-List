<?php
/**
 *
 *
 * @package IKL
 * @subpackage Domain
 * @since 2007-08-14
 * @version 2007-11-10
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */

/**
 * @access public
 */
class IKL_Domain_Regional_Currency
  extends IKL_Domain_Abstract
{
  /**
   * @see IKL_Domain_Abstract::create()
   * @param string $id Currency code according to ISO 4217
   *   (3 letters, upper case).
   * @throws IKL_Domain_Exception_StringFormat if $id is not formatted as it should.
   * @return IKL_Domain_Regional_Currency
   */
  public static function create($id)
  {
    $entity = new self();
    $entity->setId($id);
    return $entity;
  }
  
  /**
   * @param IKL_Domain_Regional_Currency_EDO_Interface $edo
   * @return IKL_Domain_Regional_Currency
   */
  public static function restore(
  	IKL_Domain_Regional_Currency_EDO_Interface $edo)
  {
    $entity = new self($edo);
    return $entity;
  }
  
  /**
   * @see IKL_Domain_Abstract::invoke()
   */
  public function invoke(IKL_Domain_Regional_Currency_EDO_Interface $edo)
  {
  	parent::invoke($edo);
  }
  
  /**
   * @param string $id Currency code according to ISO 4217
   *   (3 letters, upper case).
   * @throws IKL_Domain_Exception_StringFormat if $id is not formatted as it should.
   * @return void
   */
  private function setId($id)
  {
  	// Validate ID:
    if (!preg_match('/^[A-Z]{3}$/', $id)) {
      throw new IKL_Domain_Exception_StringFormat('invalid id format');
    }
    
    $this->data->setId($id);
  }
  
  /**
   * @param string $symbol
   * @return void
   */
  public function setSymbol($symbol)
  {
    $this->data->setSymbol(strtolower($symbol));
  }
  
  /**
   * Returns the more commonly used currency symbol, such as kr, zl, etc...
   * 
   * @return string
   */
  public function getSymbol()
  {
    return $this->data->getSymbol();
  }
}
?>