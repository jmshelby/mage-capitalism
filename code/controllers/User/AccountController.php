<?php
class Aduroware_Capitalism_User_AccountController extends Aduroware_Capitalism_Controller_Front
{

	public function indexAction($coreRoute = null)
	{
		$this->loadLayout();
		$this->_initLayoutMessages('user/session');
		$this->renderLayout();
	}

	public function enrollAction()
	{

		$hlp = Mage::helper('capitalism');
		$session = Mage::getSingleton('user/session');
		$newUsername = $this->getRequest()->getParam('new_username');

		if ($hlp->getCurrentPlayer()) {
			$session->addError("You're already enrolled.");
			$this->_redirect('*/');
			return;
		}

		if ($hlp->isUsernameTaken($newUsername)) {
			$session->addError("Username already taken, try again.");
			$this->_redirect('*/');
			return;
		}

		try {
			$newPlayer = $hlp->getCurrentPlayer($newUsername);
			$session->addSuccess("Account created!");
		} catch (Exception $e) {
			$session->addError("An error occurred while trying to create your account: ".$e->getMessage());
		}

		$this->_redirect('*/');

	}

}
