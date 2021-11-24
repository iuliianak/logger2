<?php
ini_set('display_errors', E_ALL);
error_reporting(E_ALL);

include ('vendor/autoload.php');

$date=date('Y-m-d-H-i-s');

$filename='logs/log' . '-' . $date . '.txt';


$webSite    = new \Yulia\Logger\SiteChecker();
$writer     = new \Yulia\Logger\FileWriter();
$formater   = new \Yulia\Logger\Formater();
$logger     = new \Yulia\Logger\Logger($writer,$formater);

$arrSite = $webSite->getArrWebsitesFromList('inc/Websiteslist.txt');

foreach($arrSite as $site){
    $webSite->setSite($site);
    $message = $webSite->websiteCheck($site).'<br>';
    $key = array_search($message,$logger->getArrayAnswer());

    if($key != false){
        $logger->$key($message,['level'=>$key,'url'=>$site,'filename'=>$filename]);
    } else{
    $logger->emergency($message,['level'=>'emergency','url'=>$site,'filename'=>$filename]);

    }

}