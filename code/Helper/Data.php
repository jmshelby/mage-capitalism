<?php
class Aduroware_Capitalism_Helper_Data extends Mage_Core_Helper_Abstract
{

	public function getCurrentPlayer($createWithUsername = false)
	{
		$userId = Mage::getSingleton('user/session')->getUserId();
		$player = Mage::getSingleton('capitalism/player')->loadByUser($userId,$createWithUsername);
		if ($player->getId())
			return $player;
		else
			return false;
	}

	public function isUsernameTaken($username)
	{
		return Mage::getSingleton('capitalism/player')->isUsernameTaken($username);
	}


/*
    const XML_NODE_PAGE_TEMPLATE_FILTER     = 'global/cms/page/tempate_filter';
    const XML_NODE_BLOCK_TEMPLATE_FILTER    = 'global/cms/block/tempate_filter';

    public function getPageTemplateProcessor()
    {
        $model = (string)Mage::getConfig()->getNode(self::XML_NODE_PAGE_TEMPLATE_FILTER);
        return Mage::getModel($model);
    }

    public function getBlockTemplateProcessor()
    {
        $model = (string)Mage::getConfig()->getNode(self::XML_NODE_BLOCK_TEMPLATE_FILTER);
        return Mage::getModel($model);
    }
*/

}
