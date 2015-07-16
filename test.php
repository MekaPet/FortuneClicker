<?php

include_once 'Class/Database.php';
/**
 * Created by PhpStorm.
 * User: kedoPortable
 * Date: 19/06/2015
 * Time: 11:51
 */

$farmer = Database::getFarmer(1);
var_dump($farmer);
