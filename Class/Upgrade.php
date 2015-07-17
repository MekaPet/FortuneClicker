<?php
/**
 * Created by PhpStorm.
 * User: kedoPortable
 * Date: 19/06/2015
 * Time: 10:50
 */

class Upgrade
{
    /*
     * The id of the farmer
     */
    private $id;
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
     * Farmer affected
     */
    private $id_farmer;
    /*
     * Effect of upgrade on farmer
     */
    private $effect_value;

    /*
     * Effect type on the farmer
     */
    private $effect_type;

    function __construct($id, $id_farmer)
    {
        $upgrade = Database::getUpgrade($id);
        $this->id = $id;
        $this->name =$upgrade['name'];
        $this->description = $upgrade['description'];
        $this->cost = $upgrade['cost'];
        $this->id_farmer = $id_farmer;
        $this->effect_value = $upgrade['value_effect'];

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param mixed $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    }

    /**
     * @return mixed
     */
    public function getIdFarmer()
    {
        return $this->id_farmer;
    }

    /**
     * @param mixed $id_farmer
     */
    public function setIdFarmer($id_farmer)
    {
        $this->id_farmer = $id_farmer;
    }

    /**
     * @return mixed
     */
    public function getEffectValue()
    {
        return $this->effect_value;
    }

    /**
     * @param mixed $effect
     */
    public function setEffectValue($effect)
    {
        $this->effect_value = $effect;
    }

    /**
     * @return mixed
     */
    public function getEffectType()
    {
        return $this->effect_type;
    }

    /**
     * @param mixed $effect
     */
    public function setEffectType($effect)
    {
        $this->effect_type = $effect;
    }
}