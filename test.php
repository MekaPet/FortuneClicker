<?php

include_once 'Class/Database.php';
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