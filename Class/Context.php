<?php
/**
 * Created by PhpStorm.
 * User: kedoPortable
 * Date: 24/07/2015
 * Time: 11:35
 */


/**
 * Class Context
 */
class Context {

    private $idLang;
    private $devise;

    function __construct()
    {
        $this->idLang = Context::getUserLangage();
        $this->devise = "€";
    }

    /**
     * @return mixed
     */
    public function getIdLang()
    {
        return $this->idLang;
    }

    /**
     * @param mixed $idLang
     */
    public function setIdLang($idLang)
    {
        $this->idLang = $idLang;
    }

    /**
     * @return mixed
     */
    public function getDevise()
    {
        return $this->devise;
    }

    /**
     * @param mixed $devise
     */
    public function setDevise($devise)
    {
        $this->devise = $devise;
    }

    static private function getUserLangage()
    {
        $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);
        $result = Database::getIdLangByShortName($lang);
        if($result == null)
        {

        }
    }
}