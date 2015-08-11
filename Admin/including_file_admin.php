<?php
/**
 * Created by PhpStorm.
 * User: kedoPortable
 * Date: 31/07/2015
 * Time: 16:45
 */

session_start();

Const __ADMIN__PATH__ = "../";

include_once "../Class/Context.php";
include_once "../Class/Password.php";
include_once "../Class/Database.php";
include_once "../Class/Farmer.php";
include_once "../Class/Tool.php";
include_once "../Class/Upgrade.php";
include_once "../Class/User.php";


if(isset($_SESSION['context']))
{
    $_SESSION['Context']= new Context();
}