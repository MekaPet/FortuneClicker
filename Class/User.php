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

    function __construct($pseudo, $id)
    {
        $this->pseudo = $pseudo;
        $this->id = $id;
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
            $this->farmerList[$id_farmer] = Database::getNewFarmer($id_farmer);
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
            $this->upgradeList[$id_upgrade] = new Upgrade($id_upgrade);
            return true;
        }
        else
        {
            return false;
        }
    }


}