<?php
class Aduroware_Capitalism_Account_HeartsController extends Aduroware_Capitalism_Controller_Front
{

	public function indexAction()
	{
		$this->loadLayout();
		$this->_initLayoutMessages('user/session');
		$this->renderLayout();
	}

	public function addPointsAction()
	{
		$hlp = Mage::helper('capitalism');
		$session = Mage::getSingleton('user/session');
		if ($player = $hlp->getCurrentPlayer()) {
			//if ($player->aquirePoints(5))
			if ($player->aquirePoints(1,'ACTIVITY-CLICK'))
				$session->addSuccess("One Heart Added!");
			else
				$session->addError("Problem when adding heart.");
		} else {
			$session->addError("Sorry, you don't seem to have an account.");
		}
		$this->_redirect('*/*/index');
	}

}
