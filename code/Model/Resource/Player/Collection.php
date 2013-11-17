<?php
class Aduroware_Capitalism_Model_Resource_Player_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{

    protected function _construct()
    {
        $this->_init('capitalism/player');
        //$this->_map['fields']['store'] = 'store_table.store_id';
    }

}
