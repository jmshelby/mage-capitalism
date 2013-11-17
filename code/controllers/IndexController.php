<?php
class Aduroware_Capitalism_IndexController extends Mage_Core_Controller_Front_Action
{

	public function preDispatch()
	{
		parent::preDispatch();

		if (!Mage::getSingleton('user/session')->authenticate($this)) {
			$this->setFlag('', 'no-dispatch', true);
			if (!Mage::getSingleton('user/session')->getBeforeCapitalismUrl()) {
				Mage::getSingleton('user/session')->setBeforeCapitalismUrl($this->_getRefererUrl());
			}
			Mage::getSingleton('user/session')->setBeforeCapitalismRequest($this->getRequest()->getParams());
		}
	}

	public function indexAction($coreRoute = null)
	{
		$this->loadLayout();
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
