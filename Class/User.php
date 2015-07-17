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
     * farmer d'id 1
     */
    private $farmer_1;

    /*
     * farmer d'id 2
     */
    private $farmer_2;

    /*
     * farmer d'id 3
     */
    private $farmer_3;

    /*
     * farmer d'id 4
     */
    private $farmer_4;

    function __construct($pseudo, $id)
    {
        $this->pseudo = $pseudo;
        $this->farmer_1 = Database::getNewFarmer(1);
        $this->farmer_2 = Database::getNewFarmer(2);
        $this->farmer_3 = Database::getNewFarmer(3);
        $this->farmer_4 = Database::getNewFarmer(4);
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
    public function getFarmer1()
    {
        return $this->farmer_1;
    }

    /**
     * @param mixed $farmer_1
     */
    public function setFarmer1($farmer_1)
    {
        $this->farmer_1 = $farmer_1;
    }

    /**
     * @return mixed
     */
    public function getFarmer2()
    {
        return $this->farmer_2;
    }

    /**
     * @param mixed $farmer_2
     */
    public function setFarmer2($farmer_2)
    {
        $this->farmer_2 = $farmer_2;
    }

    /**
     * @return mixed
     */
    public function getFarmer3()
    {
        return $this->farmer_3;
    }

    /**
     * @param mixed $farmer_3
     */
    public function setFarmer3($farmer_3)
    {
        $this->farmer_3 = $farmer_3;
    }

    /**
     * @return mixed
     */
    public function getFarmer4()
    {
        return $this->farmer_4;
    }

    /**
     * @param mixed $farmer_4
     */
    public function setFarmer4($farmer_4)
    {
        $this->farmer_4 = $farmer_4;
    }

    static function registerUser($pseudo, $password, $mail)
    {
        if(Database::userAllreadyExist($mail))
        {
            return true;
        }
        else
        {

        }
    }
}