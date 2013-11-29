<?php
class Aduroware_Capitalism_Controller_Front extends Mage_Core_Controller_Front_Action
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

}
