<?php
/**
 * Created by PhpStorm.
 * User: kedoPortable
 * Date: 17/07/2015
 * Time: 10:14
 */

class User
{
    /*
        * The id of the farmer
        */
    private $id;

    /*
     * Define if the user is authentified
     */
    private $authentified;
    /*
     * The pseudp is define in this variable
     */
    private $pseudo;

    /*
     * tableau de farmer
     */
    private $farmerList;

    /*
     * Tableau d'upgrade
     */
    private $upgradeList;

    /*
     * Ressources disponibles
     * Ressource avalable
     */
    private $ressourceList;


    function __construct($pseudo, $id)
    {
        $this->pseudo = $pseudo;
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getRessourceList()
    {
        return $this->ressourceList;
    }

    /**
     * @param mixed $ressourceList
     */
    private function setRessourceList($ressourceList)
    {
        $this->ressourceList = $ressourceList;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getAuthentified()
    {
        return $this->authentified;
    }

    /**
     * @param mixed $authentified
     */
    public function setAuthentified($authentified)
    {
        $this->authentified = $authentified;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return mixed
     */
    public function getFarmer($i)
    {
        return $this->farmerList[$i];
    }

    /**
     * @param mixed $farmer_1
     */
    public function setFarmer($i,$farmer_1)
    {
        $this->farmerList[$i] = $farmer_1;
    }

    /*
     * Enregistre l'utilisateur s'il n'est pas déjà présent ( email )
     * ! le password placé en paramètre doit être crypter à l'aide de Cryptage !
     */
    static function registerUser($pseudo, $password, $mail)
    {
        if(Database::userAllreadyExist($mail))
        {
            return true;
        }
        else
        {
            Database::addNewUser($mail,$pseudo,$password);
        }
    }

    /**
     * Permet a un joueur de se connecter a son compte
     * @param $mail
     * @param $password
     * @return bool|User
     */
    static function login($mail, $password)
    {
        if(Database::userAllreadyExist($mail))
        {
            if(Database::getPassword($mail) == $password)
            {
                $data = Database::getUserIdName($mail);
                $user = new User($data['pseudo'],$data['id_user']);
                $user->setAuthentified(true);
                return $user;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    public function addNewFarmerToPlayer($id_farmer)
    {
        if (!isset($this->farmerList[$id_farmer]))
        {
            $count = count($this->farmerList);
            $this->farmerList[$count] = Database::getNewFarmer($id_farmer);
            return true;
        }
        else
        {
            return false;
        }
    }

    public function addNewUpgradeToPlayer($id_upgrade)
    {
        if (!isset($this->upgradeList[$id_upgrade]))
        {
            $count = count($this->upgradeList);
            $this->upgradeList[$count] = new Upgrade($id_upgrade);
            return true;
        }
        else
        {
            return false;
        }
    }

    public function hasUpgrade($id_upgrade)
    {
        for($i = count($this->upgradeList)-1;$i>=0;$i--)
        {
            if($this->upgradeList[$i]->getId() == $id_upgrade)
            {
                return true;
            }
        }
        return false;
    }

    public function getAllProcPerInstance()
    {
        $result =0;
        for ($i = count($this->farmerList)-1;$i>=0;$i--)
        {
            $result += $this->farmerList[$i]->getProcWithUpgrade($this);
        }
        return $result;
    }

    static function isEmail($string)
    {
        if(strpos($string,'@'))
            return true;
        else
            return false;
    }

    function addProc($procValue)
    {
        $this->setRessourceList($this->getRessourceList() + $procValue);
    }

}