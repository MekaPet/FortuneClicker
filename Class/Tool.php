<?php
/**
 * Created by PhpStorm.
 * User: kedoPortable
 * Date: 17/07/2015
 * Time: 09:48
 */

class Tool {

    static function stringToNumber($string)
    {
        $int = 0;
        for($i=0;$i < strlen($string);$i++)
        {
            switch (ord($string[$i]))
            {
                case 48:
                    $int = $int*10;
                    break;
                case 49:
                    $int = $int*10 +1;
                    break;
                case 50:
                    $int = $int*10+2;
                    break;
                case 51:
                    $int = $int*10+3;
                    break;
                case 52:
                    $int = $int*10+4;
                    break;
                case 53:
                    $int = $int*10+5;
                    break;
                case 54:
                    $int = $int*10+6;
                    break;
                case 55:
                    $int = $int*10+7;
                    break;
                case 56:
                    $int = $int*10+8;
                    break;
                case 57:
                    $int = $int*10+9;
                    break;
                default:
                    break;
            }
        }
        return $int;
    }
}