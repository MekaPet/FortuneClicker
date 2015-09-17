<?php
/**
 * Created by PhpStorm.
 * User: kedoPortable
 * Date: 10/09/2015
 * Time: 17:19
 */


//Initialisation du joueur

//On récupère l'utilisateur
var_dump($_SESSION);
$user = unserialize($_SESSION['user']);
if ( isset($_SESSION['isInitialize']))
{
    if ($_SESSION['isInitialize'] != true )
    {
        //On lui ajouter les farmer
        $user->addNewFarmerToPlayer(1);
        $user->addNewFarmerToPlayer(2);
        $user->addNewFarmerToPlayer(3);
        $user->addNewFarmerToPlayer(4);
        $user->addRessource(0);

        $user->setProcPerClick(1);
        $_SESSION['isInitialize'] = true;
        $_SESSION['user'] = serialize($user);
    }
}
