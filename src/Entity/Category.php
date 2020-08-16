<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity(repositoryClass="Acilia\Repository\CategoryRepository")
* @ORM\Table(name="category")
*/
class Category 
{
    /** 
     * @var int
     * 
     * @ORM\Id
     * @ORM\Column(type="integer") 
     * @ORM\GeneratedValue
     * 
     */
    protected $id;

    /**
     * @var string
     * 
     * @ORM\Column(type="string", length=255) 
     */
    protected $name;

    /**
     * @var string
     * 
     * @ORM\Column(type="string", length=255) 
     */
    protected $description;

    public function getId() :int
    {
        return $this->id;
    }

    public function setName($name) :self
    {
        $this->name = $name;
        return $this;
    }

    public function getName() :?string
    {
        return $this->name;
    }

    public function setDescription($description) :self
    {
        $this->description = $description;
        return $this;
    }

    public function getDescription() :?string
    {
        return $this->description;
    }
}