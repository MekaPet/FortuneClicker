<?php
/**
 * Created by PhpStorm.
 * User: kedoPortable
 * Date: 19/06/2015
 * Time: 11:30
 */
include_once 'Farmer.php';
include_once 'Tool.php';
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
                'host' => "mysql:host=localhost;dbname=fortuneClickerV2",
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
            print_r($e);
            die("PDO CONNECTION ERROR: " . $e->getMessage() . "<br/>");
        }
        $this->server = array();
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
     * Recupère les informations pour créer une nouvelle instance du farmer.
     */
    static function getNewFarmer($id)
    {
        if(Database::getInstance()->PDO == null)
        {
            Database::getInstance();
        }
        $pdo = Database::getInstance()->PDO;

        $requete = $pdo->prepare('SELECT fl.Name, fl.Designation, flvl.cost, flvl.goldPerTick
                                  FROM farmer_lang fl
                                  JOIN farmer_level flvl ON fl.id_Farmer = flvl.id_farmer
                                  WHERE fl.id_Farmer = ? AND id_lang = ?' );

        $requete->execute(array($id, 1));
        $result = $requete->fetch();

        if (null != $result){
            $farmer =  new Farmer(($id));
            $farmer->setName($result['Name']);
            $farmer->setDescription($result['Designation']);
            $farmer->setLevel(1);
            $farmer->setCost($result['cost']);
            $farmer->setProcPerInstance($result['goldPerTick']);
            $farmer->getNumber(0);
        }
        return $farmer;
    }

    /*
     * Récupère les informations necessaire au lvlup du farmer
     */
    static function getFarmerLevel($id,$level)
    {
        if(Database::getInstance()->PDO == null)
        {
            Database::getInstance();
        }
        $pdo = Database::getInstance()->PDO;

        $requete = $pdo->prepare('SELECT flvl.cost, flvl.goldPerTick
                                  FROM farmer_level flvl
                                  WHERE flvl.id_Farmer = ? AND flvl.Level = ?' );
        $requete->execute(array($id, $level));
        $result = $requete->fetch();
        return $result;
    }
}
