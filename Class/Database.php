<?php
/**
 * Created by PhpStorm.
 * User: kedoPortable
 * Date: 19/06/2015
 * Time: 11:30
 */

/**
 * Class Database
 * All request is define here.
 * The pdo couldn't be access from external.
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
    /**
     * @var null|PDO
     */
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
     * @return mixed
     */
    private static function getPDO()
    {
        if(Database::getInstance()->PDO == null)
        {
            Database::getInstance();
        }
        return Database::getInstance()->PDO;
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


    /**
     * Retourne si l'utilisateur a saisie les informations adéquates pour se connecter.
     * @param $identifiant
     * @param $password
     * @return bool
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


    /**
     * Recupère les informations pour créer une nouvelle instance du farmer.
     * @param $id
     * @return Farmer|null
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
            return $farmer;
        }
        else
        {
            return null;
        }

    }

    /**
     * Récupère les informations necessaire au lvlup du farmer
     * @param $id
     * @param $level
     * @return mixed
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


    /**
     * Check if user allready exist
     * @param $mail
     * @return bool
     */
    static function userAllreadyExist($mail)
    {
        if(Database::getInstance()->PDO == null)
        {
            Database::getInstance();
        }
        $pdo = Database::getInstance()->PDO;
        $requete = $pdo->prepare('SELECT count(mail)
                                  FROM user
                                  WHERE mail = ?' );
        $requete->execute(array($mail));
        $result = $requete->fetchColumn();
        if ($result == 0 )
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    /**
     * @param $mail
     * @return mixed
     */
    static function getUserIdName($mail)
    {
        if(Database::getInstance()->PDO == null)
        {
            Database::getInstance();
        }
        $pdo = Database::getInstance()->PDO;
        $requete = $pdo->prepare('SELECT pseudo, id_user
                                  FROM user
                                  WHERE mail = ?' );
        $requete->execute(array($mail));
        return $requete->fetch();
    }

    /**
     * @param $mail
     * @param $pseudo
     * @param $password
     */
    static function addNewUser($mail,$pseudo, $password)
    {
        $pdo = Database::getPDO();
        $requete = $pdo->prepare('INSERT INTO user (mail, pseudo, password)
                                  VALUE (?,?,?)');
        $requete->execute(array($mail, $pseudo, $password));
    }

    /**
     * @param $mail
     * @return mixed
     */
    static function getPassword($mail)
    {
        $pdo = Database::getPDO();
        $requete = $pdo->prepare('SELECT password FROM user WHERE mail = ?');
        $requete->execute(array($mail));
        $result = $requete->fetch();
        return $result['password'];
    }


    /**
     * @param $id
     * @return mixed
     */
    static function getUpgrade($id)
    {
        $pdo = Database::getPDO();
        $requete = $pdo->prepare('SELECT u.value_effect, e.effect as type_effet, ul.description, ul.name, u.cost, u.id_farmer
                                    FROM upgrade u
                                    JOIN effect_type e ON e.id_effect_type = u.type_effect
                                    JOIN upgrade_lang ul ON ul.id_upgrade = u.id_upgrade
                                    WHERE ul.id_lang  = 1
                                      AND ul.id_upgrade = ?
                                    ');
        $requete->execute(array($id));
        return $requete->fetch();
    }

    /**
     * @param $id_farmer
     * @return mixed
     */
    static function getAllUpdateForFarmer($id_farmer)
    {
        $pdo = Database::getPDO();
        $requete = $pdo->prepare('SELECT u.id_upgrade, et.effect
                                    FROM upgrade u
                                    JOIN effect_type et ON et.id_effect_type = u.type_effect
                                    WHERE u.id_farmer = ?
                                    ');
        $requete->execute(array($id_farmer));
        return $requete->fetchAll();
    }

    static function getIdLangByShortName($shortName)
    {
        $pdo = Database::getPDO();
        $requete = $pdo->prepare('SELECT id_lang FROM lang where shortName = ?');
        $requete->execute(array($shortName));
        $result = $requete->fetch();
        return $result['id_lang'];
    }


    /**
     * @param null $lang
     * @param null $designation
     * @param null $name
     */
    static function addFarmer($lang = null, $designation = null, $name = null)
    {
        $pdo = Database::getPDO();
        $requete = $pdo->prepare('INSERT INTO farmer (id_media, dateAdd, DateUpdate) VALUE (NULL,'.date("dd.mm.YYYY").','.date("dd.mm.YYYY").')');
        $requete->execute();
        if($lang != null)
        {

            $requeteTraduction = $pdo->prepare('INSERT INTO farmer_lang (Designation, Name) VALUE (?,?)');
            var_dump($requeteTraduction);
            $requeteTraduction->execute(array($designation,$name));
        }
    }
}
