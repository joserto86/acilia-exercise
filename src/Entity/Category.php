<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
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

    public function getId() :int
    {
        return $this->id;
    }

    public function setName($name) :Category
    {
        $this->name = $name;
        return $this;
    }

    public function getName() :string
    {
        return $this->name;
    }

    public function setDescription($description) :Category
    {
        $this->description = $description;
        return $this;
    }

    public function getDescription() :string
    {
        return $this->description;
    }
}