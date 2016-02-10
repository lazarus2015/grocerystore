<?php
class Meigee_CategoriesEnhanced_Model_Category_Attribute_Source_Block_Menutype extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
{	
	public function getAllOptions()
	{
		if (!$this->_options)
		{
			$this->_options = array(
				array('value' => 0,		'label' => 'Wide Submenu'),
				array('value' => 1,		'label' => 'Default Dropdown')
			);
        }
		return $this->_options;
    }
}
