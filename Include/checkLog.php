<?php
/**
 * Created by PhpStorm.
 * User: kedoPortable
 * Date: 22/07/2015
 * Time: 09:44
 */

if(isset($_SESSION['user']) && $_SERVER['PHP_SELF'] != '/FortuneClicker/main.php')
{
    header("Location: main.php");

}
else if(!isset($_SESSION['user']))
{
    header("Location: login.php");
}
?>