<?php

include_once 'including_file.php';
/**
 * Created by PhpStorm.
 * User: kedoPortable
 * Date: 19/06/2015
 * Time: 11:51
 */

//Pour créer un farmer
$farmer = Database::getNewFarmer(1);
//Pour monter de niveau un farmer.
$farmer->update();
//Pour ajouter un farmer
$farmer->add1Farmer();
$farmer->add1Farmer();
$farmer->update();
$farmer->goldPerSecondWithoutUpgrade();
var_dump($farmer);
$user = new User("kedorev",4);
var_dump($user);
var_dump(Database::userAllreadyExist("kedorev@gmail.com"));
Database::addNewUser("toto@gmail.com","azerty","azerty");

var_dump(Cryptage::encrypt("test"));
var_dump(Database::getUpgrade(1));