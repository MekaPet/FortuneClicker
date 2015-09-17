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
            $user = unserialize($_SESSION['user']);
            $user->addRessource($user->getProcPerClick());
            $_SESSION['user'] = serialize($user);
            echo $user->getRessourceList();
            break;
        case 'buyFarmer1':
            $user = unserialize($_SESSION['user']);
            if ($user->getRessourceList() >= $user->getFarmer(0)->getCost())
            {
                $user->getFarmer(0)->addFarmer(1);
                $user->setRessourceList($user->getRessourceList()-$user->getFarmer(0)->getCost());
                $_SESSION['user'] = serialize($user);
                $return['number'] = $user->getFarmer(0)->getNumber();
                $return['ressourceAvailable'] = $user->getRessourceList();
                $return['peptiteParSeconde'] = $user->getAllProcPerInstance();
                echo json_encode($return);
            }
            else
            {
                echo -1;
            }
            /*if (buyOneFarmer(0) != -1)
            {
                echo json_encode($return);
            }*/
            break;
        case 'buy1Farmer2':
            if (buyOneFarmer(1) != -1)
            {
                echo ($return);
            }
            break;
        case 'buy1Farmer3':
            if (buyOneFarmer(2) != -1)
            {
                echo ($return);
            }
            break;
        case 'buy1Farmer4':
            if (buyOneFarmer(3) != -1)
            {
                echo ($return);
            }
            break;
        case 'ressourcePerSeconde':
            $user = unserialize($_SESSION['user']);
            $user->addRessource($user->getAllProcPerInstance());
            $_SESSION['user'] = serialize($user);
            echo $user->getRessourceList() ;
            break;
        case 'save':

    }

}

function buyOneFarmer($i){
    $user = unserialize($_SESSION['user']);
    if ($user->getRessourceList() >= $user->getFarmer($i)->getCost())
    {
        $user->getFarmer($i)->addFarmer(1);
        $user->setRessourceList($user->getRessourceList()-$user->getFarmer($i)->getCost());
        $_SESSION['user'] = serialize($user);
        $return['number'] = $user->getFarmer($i)->getNumber();
        $return['ressourceAvailable'] = $user->getRessourceList();
        $return['peptiteParSeconde'] = $user->getAllProcPerInstance();
        return $return;
    }
    else
    {
        return -1;
    }
}