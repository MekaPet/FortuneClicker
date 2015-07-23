<?php
/**
 * Created by PhpStorm.
 * User: kedoPortable
 * Date: 22/07/2015
 * Time: 09:44
 */

session_start();
if(isset($_SESSION['user']))
{
    header("Location: main.php");
}
else
{
    header("Location: login.php");
}
exit();
?>