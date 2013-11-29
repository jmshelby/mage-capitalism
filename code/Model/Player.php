<?php
class Aduroware_Capitalism_Model_Player extends Cm_Mongo_Model_Abstract
{

    protected function _construct()
    {
        $this->_init('capitalism/player');
    }

    public function loadByUser($user, $createWithUsername = false)
    {
        if ($user instanceof Aduroware_User_Model_User) {
            $user = $user->getId();
        }

        $user = (int) $user;
        $this->_getResource()->load($this, $user, 'user_id');
        if (!$this->getId() && is_string($createWithUsername)) {
            $this->setUserId($user);
            $this->setUsername($createWithUsername);
            $this->save();
        }

        return $this;
    }

	public function isUsernameTaken($username)
	{
		$player = Mage::getModel('capitalism/player')->load($username,'username');
		if ($player->getId())
			return true;
		else
			return false;
	}

	public function aquirePoints($points,$activity = "N/A")
	{
		$currentPoints = $this->getPointsCurrent();
		$this->setPointsCurrent($currentPoints + $points);

		$pointActivity = Mage::getModel('capitalism/player_point_activity');
		$pointActivity->setPointsAquired($points);
		$pointActivity->setActivityType($activity);
		$pointActivity->setActivityDate(new MongoDate());

		$this->getPointActivity()->addItem($pointActivity);

		$this->save();
		return true;
	}

	public function getPointActivity()
	{
		return $this->_getEmbeddedCollection('point_activity');
	}

    protected function _beforeSave()
    {

		parent::_beforeSave();
		$this->getDataSetDefault('points_current',0.0);
		$this->getDataSetDefault('money_current',0.0);
		return $this;
    }

}
