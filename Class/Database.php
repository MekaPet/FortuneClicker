<?php
/**
 * Created by PhpStorm.
 * User: kedoPortable
 * Date: 19/06/2015
 * Time: 11:30
 */

class Database
{

    /**
     * Instance de la classe SPDO
     *
     * @var $DatabaseInstance
     * @access private
     */
    private static $DatabaseInstance = null;


    /**
     * surcharge de la fonction clone pour eviter le clonage et ainsi avoid le singleton
     *
     * @access private
     */
    private function __clone()
    {

    }


    /**
     * Définition des constantes
     *
     *
     * @access private
     */
    private $server = null;
    private $PDO = null;


    /**
     * Définition du constructeur pour la classe singleton étendu de PDO
     *
     *
     */
    private function __construct()
    {
        //var_dump($_SERVER);
        if ($_SERVER['HTTP_HOST'] == "localhost"){
            $this->server = array(
                'host' => "mysql:host=localhost;dbname=fortuneClicker",
                'username' => 'root' ,
                'password' => ''
            );
        }
        else
        {
            $this->server = array(
                'host' => "",
                'username' => '' ,
                'password' => ""
            );
        }


        try
        {
            $this->PDO = new PDO($this->server['host'], $this->server['username'], $this->server['password']);
        }
        catch (PDOException $e)
        {
            die("PDO CONNECTION ERROR: " . $e->getMessage() . "<br/>");
        }
        //$this->server = array();
    }




    /**
     * retourne l'instance de la classe
     *
     * @return PDO
     */
    public static function getInstance()
    {
        if(self::$DatabaseInstance == null)
        {
            self::$DatabaseInstance = new Database();
        }
        return self::$DatabaseInstance;
    }


    /*
     * Retourne un utilisateur
     * @var $password
     * @return  l'instance du user
     */
    static function getUser($identifiant, $password)
    {
        if(!isempty(self::$PDO) && login($identifiant,$password))
        {
            $requete = self::$PDO->prepare('SELECT * FROM user WHERE identifiant = ?');
            $requete->exec(array($identifiant));
            $result = $requete->fetchColumn();

            $_SESSION['User'] = new User($result('identifiant'), $result('mail'), $result('firstname'),$result('lastname'),$result('isAdmin') );
            return true;
        }
        else
        {
            return false;
        }
    }

    /*
    *  Retourne si l'utilisateur a saisie les informations adéquates pour se connecter.
    *
    * @var $identifiant, $password
    * @acces public
    * @return boolean
    */
    function canLogin($identifiant,$password)
    {

        $requete = $this->pdo->prepare("SELECT count(*) FROM user WHERE log = ? AND mdp = ?");
        $requete->exec(array($identifiant,$password));
        $nb_res = $requete->fetchColumn();

        if ($nb_res == 1)
        {
            return true;
        }// ok
        else // pas ok
        {
            return false;
        }
    }

    /*
     *
     */
    static function getFarmer($id)
    {
        if(!isempty(self::$PDO))
        {
            self::getInstance();
        }
        $requete = self::$PDO->prepare('SELECT fl.Designation, fl.Name
                                        FROM farmer_lang fl
                                        WHERE fl.id_Farmer = ?');
        $requete->exec(array($id));
        $result = $requete->fetchColumn();

        $farmer =  new Farmer(($id));
        $farmer->setName($result['Name']);
        $farmer->setDescription($result['Designation']);
    }
    // flvl.Cost, flvl.GoldPerTick, flvl.Cost
//JOIN farmerlevel flvl on f.id_Farmer = flvl.id_Farmer
}
