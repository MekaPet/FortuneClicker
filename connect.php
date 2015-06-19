<?php
/**
 * Created by PhpStorm.
 * User: Benjamin
 * Date: 11/06/2015
 * Time: 10:57
 */
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "responsive";

try{

    $cowin = new PDO("mysql:host=$host; dbname=$dbname", $user, $password);
}catch(PDOException $erreur){
    echo "erreur : " .$erreur->getMessage();
}

if((isset($_POST['pass2']) && isset($_POST['name2'])) && (isset($_POST['name2']) != "") && (isset($_POST['pass2']) != ""))
{
    $mdpUserConnect = $_POST['pass2'];
    $test2 = 0;
    $logUserConnect = $_POST["name2"];


    $resultat = $cowin->prepare("SELECT COUNT(*) FROM login WHERE log = ? AND mdp = ? ");
    $resultat->execute(array($logUserConnect, $mdpUserConnect));
    //$resultat2 = $cowin->prepare("SELECT COUNT(*) FROM login WHERE mdp = ? ");
    $test = $resultat->fetch();

    if ($test[0] != 0) {
        //header('Location: http://www.by/Accueil.html');
        //echo "Bienvenu";
        $data = 0;
        //echo $data;
    }
    else {
        // existe pas
        echo "Vos identifiant sont errone";
    }
}

$cowin = NULL;
?>