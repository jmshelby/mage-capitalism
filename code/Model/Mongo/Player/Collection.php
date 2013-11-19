<?php
class Aduroware_Capitalism_Model_Mongo_Player_Collection extends Cm_Mongo_Model_Resource_Collection_Abstract
{

    protected function _construct()
    {
        $this->_init('capitalism/player');
    }

}
