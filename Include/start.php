<?php
/**
 * Created by PhpStorm.
 * User: kedoPortable
 * Date: 10/09/2015
 * Time: 17:19
 */

$xajax = new xajax();

//Initialisation du joueur

//On récupère l'utilisateur
$user = unserialize($_SESSION['user']);
//On lui ajouter les farmer
$user->addNewFarmerToPlayer(1);
$user->addNewFarmerToPlayer(2);
$user->addNewFarmerToPlayer(3);
$user->addNewFarmerToPlayer(4);
$user->addRessource(0);

$user->setProcPerClick(1);