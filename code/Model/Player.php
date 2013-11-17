<?php
class Aduroware_Capitalism_Model_Player extends Mage_Core_Model_Abstract
{

    protected function _construct()
    {
        $this->_init('capitalism/player');
    }

    protected function _beforeSave()
    {
		return parent::_beforeSave();
    }

}
