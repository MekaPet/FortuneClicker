<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "responsive";

try{

    $cowin = new PDO("mysql:host=$host; dbname=$dbname", $user, $password);
}catch(PDOException $erreur){
    echo "erreur : " .$erreur->getMessage();
}

if(isset($_POST['pass']) && isset($_POST['name']))
{
    $mdpUser = $_POST['pass'];
    $test = 0;
    $logUser = $_POST["name"];


    $resultat = $cowin->query("SELECT * FROM login WHERE log ='" .$logUser."'");
    $test = $resultat->fetch();

    if ($test) {
        echo "l'emai existe déjà \n";
    }
    else {
        // existe pas
        $sql = $cowin->prepare('INSERT INTO login (log, mdp) VALUES (?, ?)');
        $sql->execute(array($logUser, $mdpUser));

    }
}

echo "Login : " . $_POST["name"] . "\n";
echo "Mot de passe : " . $_POST["pass"];
$cowin = NULL;
?>