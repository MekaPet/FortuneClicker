<?php

include_once 'including_file.php';
/**
 * Created by PhpStorm.
 * User: kedoPortable
 * Date: 19/06/2015
 * Time: 11:51
 */

//Pour créer un farmer
//$farmer = Database::getNewFarmer(1);
//Pour monter de niveau un farmer.
//$farmer->update();
//Pour ajouter un farmer
//$farmer->add1Farmer();
//$farmer->add1Farmer();
//$farmer->update();
//$farmer->goldPerSecondWithoutUpgrade();
//var_dump($farmer);
//var_dump($user);
//var_dump(Database::userAllreadyExist("kedorev@gmail.com"));

//var_dump(Cryptage::encrypt("test"));
//var_dump(Database::getUpgrade(1));

$user = User::login("kedorev@gmail.com",Cryptage::encrypt("azerty"));

$user->addNewFarmerToPlayer(1);
$user->addNewFarmerToPlayer(2);
$user->addNewUpgradeToPlayer(2);
$user->addNewUpgradeToPlayer(1);
var_dump($user->getFarmer(0)->addFarmer(4));
var_dump($user->getFarmer(1)->addFarmer(1));
var_dump($user);

//var_dump($farmer->getProcWithUpgrade($user));
//$farmer->add1Farmer();
//var_dump($farmer->getProcWithUpgrade($user));
var_dump($user->getAllProcPerInstance($user));