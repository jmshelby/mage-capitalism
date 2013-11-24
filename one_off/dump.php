<?php
error_reporting(E_ALL | E_STRICT);
$mageFilename = '../../..//app/Mage.php';
if (!file_exists($mageFilename)) {
    echo $mageFilename." was not found";
    exit;
}
require_once $mageFilename;
umask(0);
$app = Mage::app();
$app->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);
$app->getResponse()->setHeader('Content-type', 'text/plain',true);
$app->getResponse()->sendHeaders();
echo "\n", "\n", "\n", "\n", "\n", "\n";
echo "" , "\n";
echo "=============================================================================================================================================================" , "\n";
echo "Capitalism - Dump" , "\n";
echo "=============================================================================================================================================================" , "\n";
echo "" , "\n";
echo "" , "\n";


$players = Mage::getModel('capitalism/player')->getCollection();


foreach($players as $player) {


	print_r($player->getData());
	
	echo "" , "\n";
	echo "" , "\n";
	echo "=================================================" , "\n";

}


