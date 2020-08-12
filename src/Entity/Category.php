<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Swagger\Annotations as SWG;

/**
* @ORM\Entity(repositoryClass="Acilia\Repository\CategoryRepository")
* @ORM\Table(name="category")
*/
class Category 
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer") 
     * @ORM\GeneratedValue
     * 
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255) 
     * @SWG\Property(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=255) 
     * @SWG\Property(type="string")
     */
    protected $description;

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }
}