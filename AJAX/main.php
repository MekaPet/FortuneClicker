<?php
/**
 * Created by PhpStorm.
 * User: kedoPortable
 * Date: 15/09/2015
 * Time: 10:56
 */

include '../including_file.php';

if (isset($_POST['methode']))
{
    switch ($_POST['methode'])
    {
        case "ClickPepite":
            $user = unserialize($_POST)
            $user->addRessource($user->getProcPerClick());
            echo $user->getRessourceList();
            break;
        case 'buy1Farmer1':
            break;
        case 'buy1Farmer2':
            break;
        case 'buy1Farmer3':
            break;
    }

}
