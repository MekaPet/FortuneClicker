<?php
/**
 * Created by PhpStorm.
 * User: kedoPortable
 * Date: 17/07/2015
 * Time: 11:15
 */

class Cryptage
{

    static function encrypt($string)
    {
        //Cle de hash
        $salt = ",,Gp9n34,]KBEe26[8enH);v^ZaBvRj8%8(a5BtRF3Y,66?@_heUd8J]C46p";

        return crypt($string, $salt);
    }


}