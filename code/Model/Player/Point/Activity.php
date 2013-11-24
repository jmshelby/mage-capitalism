<?php
class Aduroware_Capitalism_Model_Player_Point_Activity extends Cm_Mongo_Model_Abstract
{

    protected function _construct()
    {
        $this->_init('capitalism/player_point_activity');
    }

    protected function _beforeSave()
    {
Mage::log(__METHOD__.": inside");
		parent::_beforeSave();
		//$this->getDataSetDefault('activity_date', new MongoDate());
		return $this;
    }

}
