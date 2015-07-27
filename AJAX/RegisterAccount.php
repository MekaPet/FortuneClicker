<?php
/**
 * Created by PhpStorm.
 * User: kedoPortable
 * Date: 21/07/2015
 * Time: 10:52
 */

include '../including_file.php';
if(isset($_POST['mail']))
{
    $mail = $_POST['mail'];
    if (isset($_POST['password']))
    {
        $password = Cryptage::encrypt($_POST['password']);
        if(isset($_POST['id']))
        {
            $pseudo = $_POST['id'];
            Database::addNewUser($mail,$pseudo, $password);
            //mail($mail,"inscription a fortune clicker","Merci pour votre inscription a fortune clicker. Votre identifiant est ".$mail." et votre mot de passe est : ".$_POST['password']);
            $user = User::login($mail,$password);
            if($user == false)
            {
                echo 0;
            }
            else
            {
                $_SESSION['user'] = $user;
                echo 1;
            }

        }
        else
        {
            echo "pseudo non définit";
        }
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
