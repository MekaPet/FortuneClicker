<?php
/**
 * Created by PhpStorm.
 * User: kedoPortable
 * Date: 15/09/2015
 * Time: 10:56
 */

include '../including_file.php';

if ($_POST['Methode'] == 'clickOnPepite')
{
    $user->addRessource($user->getProcPerClick());
    echo $user->getRessourceList();
}