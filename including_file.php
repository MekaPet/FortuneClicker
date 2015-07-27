<?php
/**
 * Created by PhpStorm.
 * User: kedoPortable
 * Date: 17/07/2015
 * Time: 10:19
 */
session_start();
include_once "Class/Context.php";
include_once "Class/Cryptage.php";
include_once "Class/Database.php";
include_once "Class/Farmer.php";
include_once "Class/Tool.php";
include_once "Class/Upgrade.php";
include_once "Class/User.php";


if(isset($_SESSION['context']))
{
    $_SESSION['Context']= new Context();
}