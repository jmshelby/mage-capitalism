<?php
class Aduroware_Capitalism_Model_Resource_Player_Transaction extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('capitalism/player_transaction', 'player_transaction_id');
    }

}
