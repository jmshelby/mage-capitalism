<?php
class Aduroware_Capitalism_PlayerController extends Mage_Core_Controller_Front_Action
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

/*
	public function indexAction($coreRoute = null)
	{
		$this->loadLayout();
		$this->renderLayout();
	}
*/

	public function addPointsAction()
	{
		$hlp = Mage::helper('capitalism');
		$session = Mage::getSingleton('user/session');
		if ($player = $hlp->getCurrentPlayer()) {
			//if ($player->aquirePoints(5))
			if ($player->aquirePoints(1,'ACTIVITY-CLICK'))
				$session->addSuccess("Account created!");
			else
				$session->addError("Problem when adding point.");
		} else {
			$session->addError("Sorry, you don't seem to have an account.");
		}
		$this->_redirect('*/index/');
	}

}
