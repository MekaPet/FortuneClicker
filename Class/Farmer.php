<?php
/**
 * Created by PhpStorm.
 * User: kedoPortable
 * Date: 19/06/2015
 * Time: 10:18
 */

class Farmer
{
    /*
     * The id of the farmer
     */
    private $id;
    /*
     * The level is define in this variable
     */
    private $level;
    /*
     * The name is define in this variable
     */
    private $name;
    /*
     * The description of the farmer
     */
    private $description;
    /*
     * The cost of the next upgrade.
     */
    private $cost;
    /*
     * The amount of the upgrade
     */
    private $number;
    /*
     * The amount of the gold earn per tick
     */
    private $procPerInstance;
    /*
     * The URL of the image
     */
    private $urlImage;




    function __construct($id)
    {
        $this->id = $id;
    }

////////////////////////
//////// Getter ////////
////////////////////////

    /*
     *@return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->cost;
    }
    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }
    /**
     * @return mixed
     */
    public function getProcPerInstance()
    {
        return $this->procPerInstance;
    }
    /**
     * @return mixed
     */
    public function getUrlImage()
    {
        return $this->urlImage;
    }


////////////////////////
//////// Setter ////////
////////////////////////

    /**
     * @param mixed $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param mixed $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @param mixed $procPerInstance
     */
    public function setProcPerInstance($procPerInstance)
    {
        $this->procPerInstance = $procPerInstance;
    }

    /**
     * @param mixed $urlImage
     */
    public function setUrlImage($urlImage)
    {
        $this->urlImage = $urlImage;
    }

    public function update()
    {
        $this->setLevel($this->getLevel() +1);
        $data = Database::getFarmerLevel($this->getId(), $this->getLevel());
        $this->setCost($data['cost']);
        $this->setProcPerInstance($data['goldPerTick']);
    }

    public function addFarmer($i)
    {
        $number = $this->getNumber();
        if(isset($number))
        {
            $this->setNumber($number + $i);
        }
        else
        {
            $this->setNumber($i);
        }
    }

    /*
     * Permet d'augmenter le nombre du farmer de 1
     */
    public function add1Farmer()
    {
        $this->addFarmer(1);
    }

    /*
     * Fonction en dev : non utilisable pour le moment
     */
    public function add10Farmer()
    {
        $this->addFarmer(10);
    }

    /*
     * Fonction en dev : non utilisable pour le moment
     */
    public function add100Farmer()
    {
        $this->addFarmer(100);
    }

    /*
     * Retourne le nombre de gold par seconde que le farmer génère sans les bonus.
     */
    public function goldPerSecondWithoutUpgrade()
    {
        return ($this->getNumber() * Tool::stringToNumber($this->getProcPerInstance()));
    }


    public function getProcWithUpgrade($user)
    {
        $result = Tool::stringToNumber($this->getProcPerInstance());
        $multiple = 1.0;
        $upgradeListe = Database::getAllUpdateForFarmer($this->getId());
        for( $i = count($upgradeListe)-1; $i>= 0; $i--)
        {
            if($user->hasUpgrade($upgradeListe[$i]['id_upgrade']))
            {

                if ($upgradeListe[$i]['effect'] ==  "+") {
                    $upgrade = Database::getUpgrade($upgradeListe[$i]['id_upgrade']);
                    $result = $result + Tool::stringToNumber($upgrade['value_effect']);
                } else if ($upgradeListe[$i]['effect'] == "*") {
                    $upgrade = Database::getUpgrade($upgradeListe[$i]['id_upgrade']);
                    $multiple = $upgrade['value_effect'] * $multiple;
                }
            }
        }
        ;
        return $result * $multiple * $this->getNumber();
    }
}