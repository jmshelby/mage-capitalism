<?php
class Aduroware_Capitalism_Block_Player_Abstract extends Mage_Core_Block_Template
{

	public function getPlayer()
	{
		$hlp = Mage::helper('capitalism');
		$player = $hlp->getCurrentPlayer();
		return $player;
	}

	public function isUserEnrolled()
	{
		if ($this->getPlayer())
			return true;
		else
			return false;
	}

}
