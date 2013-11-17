<?php
class Aduroware_Capitalism_Block_Links extends Mage_Page_Block_Template_Links_Block
{
    protected $_position = 30;

    protected function _toHtml()
    {
		$this->initLinkProperties();
		return parent::_toHtml();
    }

    public function initLinkProperties()
    {
        $text = $this->_createLabel();
        $this->_label = $text;
        $this->_title = $text;
        $this->_url = $this->getUrl('capitalism');
    }

    protected function _createLabel()
    {
		return $this->__('Capitalism');
    }

}
