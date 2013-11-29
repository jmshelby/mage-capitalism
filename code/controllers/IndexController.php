<?php
class Aduroware_Capitalism_IndexController extends Aduroware_Capitalism_Controller_Front
{

	public function indexAction($coreRoute = null)
	{
		$this->loadLayout();
		$this->renderLayout();
	}

}
