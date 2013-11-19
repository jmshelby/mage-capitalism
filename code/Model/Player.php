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

    protected function _beforeSave()
    {

		parent::_beforeSave();
		$this->getDataSetDefault('points_current',0.0);
		$this->getDataSetDefault('money_current',0.0);
		return $this;
    }

}
