<?php
/**
 * Created by PhpStorm.
 * User: kedoPortable
 * Date: 17/07/2015
 * Time: 10:19
 */

function chargerClasse($classe)
{
    require_once '/Class/' . $classe . '.php';
}

spl_autoload_register('chargerClasse');


if(isset($_SESSION['context']))
{
    $_SESSION['Context']= new Context();
}