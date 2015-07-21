<?php
/**
 * Created by PhpStorm.
 * User: kedoPortable
 * Date: 21/07/2015
 * Time: 10:53
 */


/*
 * Le fichier php retourne 1 si c'est valide ou 0 sinon.
 */
session_start();

include '../including_file.php';
if(isset($_POST['mail']))
{
    $mail = $_POST['mail'];
    if (isset($_POST['password']))
    {
        $password = Cryptage::encrypt($_POST['password']);
        $user = (User::login($mail,$password));
        echo 1;
    }
    else
    {
        echo "password non définit";
    }
}
else
{
    echo "mail non définit";
}