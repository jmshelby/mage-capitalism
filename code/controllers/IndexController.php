<?php
class Aduroware_Capitalism_IndexController extends Mage_Core_Controller_Front_Action
{

    public function indexAction($coreRoute = null)
    {
        $this->loadLayout();
        $this->renderLayout();
    }

}
