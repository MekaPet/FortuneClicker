<?php
/**
 * Created by PhpStorm.
 * User: kedoPortable
 * Date: 17/07/2015
 * Time: 11:15
 */

class Password
{

    private static $PASSWORD_MIN_SIZE = 8;
    private static $PASSWORD_MAX_SIZE = 15;
    private static $PASSWORD_SPECIAL_CHAR_MIN = 0;
    private static $PASSWORD_NUMBER_CHAR_MIN = 1;
    private static $PASSWORD_UPPER_CHAR_MIN = 1;


    static function encrypt($string)
    {
        //Cle de hash
        $salt = ",,Gp9n34,]KBEe26[8enH);v^ZaBvRj8%8(a5BtRF3Y,66?@_heUd8J]C46p";
        $pre = "drfxcvbsdoè-ç5+6'('dfg,:dfs";

        $string = $pre + $string;
        return crypt($string, $salt);
    }

    static function generateNew()
    {
        $charAvailable = 'AZERTYUIOPMLKJHGFDSQWXCVBNazertyuiopmlkjhgbnvfdcxsqw0123456789&"([-_)=}{/*-+§%$£*µ';
        $isValide = false;
        while($isValide == false)
        {
            $password ='';
            for($i = 0;$i<Password::$PASSWORD_MAX_SIZE;$i++)
            {
                $password = $password . $charAvailable[mt_rand(0,strlen($charAvailable)-1)];
            }
            $isValide = Password::isAllowed($password);

        }

        return $password;
    }

    static function isAllowed($password)
    {
        echo $password . "\n";
        echo "nb upper case : " .Password::nbUpperChar($password);

        if(strlen($password)> Password::$PASSWORD_MAX_SIZE or strlen($password) < Password::$PASSWORD_MIN_SIZE)
        {
            return false;
        }
        else if (Password::nbSpecialChar($password) < Password::$PASSWORD_SPECIAL_CHAR_MIN)
        {
            return false;
        }
        else if (Password::nbNumberChar($password) < Password::$PASSWORD_NUMBER_CHAR_MIN)
        {
            return false;
        }
        else if (Password::nbUpperChar($password) < Password::$PASSWORD_UPPER_CHAR_MIN)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    static function nbSpecialChar($string)
    {
        $charAvailable = '&"([-_)=}{/*-+§%$£*µ';
        $nb = 0;
        for($i = strlen($string)-1;$i>=0;$i--)
        {
            if (strpos($charAvailable, $string[$i]))
            {
                $nb++;
            }
        }
        return $nb;
    }

    static function nbNumberChar($string)
    {
        $charAvailable = '0123456789';
        $nb = 0;
        for($i = strlen($string)-1;$i>=0;$i--)
        {
            if (strpos($charAvailable, $string[$i]))
            {
                $nb++;
            }
        }
        return $nb;
    }

    static function nbUpperChar($string)
    {
        $charAvailable = 'AZERTYUIOPMLKJHGFDSQWXCVBNA';
        $nb = 0;
        for($i = strlen($string)-1;$i>=0;$i--)
        {
            if (strpos($charAvailable, $string[$i]) == null)
            {
                $nb++;
            }
        }
        return $nb;
    }
}