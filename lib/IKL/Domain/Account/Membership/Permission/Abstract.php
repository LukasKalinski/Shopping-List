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

require_once 'IKL/Domain/Language/Expression/Alias.php';
require_once 'IKL/Domain/Language/Manager.php';

/**
 * @access public
 */
abstract class IKL_Domain_Account_Membership_Permission_Abstract
	extends IKL_Domain_Abstract
{
	/**
	 * Label value cache (so we don't have to retrieve language data
	 * more than once).
	 * 
	 * Null value means cache empty.
	 * 
	 * @var string
	 */
	private $label = null;
	
	/**
	 * Description value cache (so we don't have to retrieve language data
	 * more than once).
	 * 
	 * Null value means cache empty.
	 * 
	 * @var string
	 */
	private $desc = null;
	
	/**
	 * Set the language-specific label of this permission.
	 * 
	 * @param IKL_Domain_Language_Expression_Alias $label
	 * @return void
	 */
	protected function setLabelAlias(IKL_Domain_Language_Expression_Alias $label)
	{
		$this->label = null; // Clear cached value.
		$this->data->setLabelAlias($label);
	}
	
	/**
	 * Set the language-specific description of this permission.
	 * 
	 * @param IKL_Domain_Language_Expression_Alias $desc
	 * @return void
	 */
	protected function setDescAlias(IKL_Domain_Language_Expression_Alias $desc)
	{
		$this->label = null; // Clear cached value.
		$this->data->setDescAlias($desc);
	}
	
	/**
	 * Set name to use within the system (i.e. end-user transparent).
	 * 
	 * @param string $name
	 * @return void
	 */
	protected function setName($name)
	{
		$this->data->setName($name);
	}
	
	/**
	 * Get the language-specific label of this permission.
	 * 
	 * @return string
	 */
	public function getLabel()
	{
		// Get expression string if not already cached:
		if (!$this->label) {
			$this->label = IKL_Domain_Language_Manager::
				interpretAlias($this->data->getLabelAlias())->
				getExpression();
		}
		return $this->label;
	}
	
	/**
	 * Get the language-specific description of this permission.
	 * 
	 * @return string
	 */
	public function getDescription()
	{
		// Get expression string if not already cached:
		if (!$this->desc) {
			$this->desc = IKL_Domain_Language_Manager::
				interpretAlias($this->data->getDescAlias())->
				getExpression();
		}
		return $this->desc;
	}
}
?>