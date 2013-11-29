<?php
class Aduroware_Capitalism_AccountController extends Aduroware_Capitalism_Controller_Front
{

	public function indexAction()
	{
		$this->loadLayout();
		$this->_initLayoutMessages('user/session');
		$this->renderLayout();
	}

	public function dashboardAction()
	{
		$this->loadLayout();
		$this->_initLayoutMessages('user/session');
		$this->renderLayout();
	}

	public function editAction()
	{
		$this->loadLayout();
		$this->_initLayoutMessages('user/session');
		$this->renderLayout();
	}

}
