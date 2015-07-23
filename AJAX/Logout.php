<?php
/**
 * Created by PhpStorm.
 * User: kedoPortable
 * Date: 22/07/2015
 * Time: 10:27
 */

session_start();
session_destroy();
header("Location: ../login.php");