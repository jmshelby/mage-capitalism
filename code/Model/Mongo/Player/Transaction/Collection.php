<?php
class Aduroware_Capitalism_Model_Mongo_Player_Transaction_Collection extends Cm_Mongo_Model_Resource_Collection_Abstract
{

    public function _construct()
    {
        $this->_init('capitalism/player_transaction');
    }

}
