<?php
class Aduroware_Capitalism_Model_Player_Transaction extends Cm_Mongo_Model_Abstract
{

    protected function _construct()
    {
        $this->_init('capitalism/player_transaction');
    }

    protected function _beforeSave()
    {
		return parent::_beforeSave();
    }

}
