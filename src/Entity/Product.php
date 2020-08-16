<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Category;

/**
* @ORM\Entity
* @ORM\Table(name="product")
*/
class Product
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
     * @var Category
     * 
     * @ORM\ManyToOne(targetEntity="App\Entity\Category")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;

    /** 
     * @var float
     * 
     * @ORM\Column(type="float") 
     */
    protected $price;

    /** 
     * @var string
     * 
     * @ORM\Column(type="string", length=10) 
     */
    protected $currency;

    /**
     * @var bool
     * 
     * @ORM\Column(type="boolean")
     */
    protected $featured;

    public function getId() :?int
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

    public function setCategory(Category $category) :self
    {
        $this->category = $category;
        return $this;
    }

    public function getCategory() :?Category
    {
        return $this->category;        
    }

    public function setPrice($price) :self
    {
        $this->price = $price;
        return $this;
    }

    public function getPrice() :?float
    {
        return $this->price;
    }

    public function setCurrency($currency) :self
    {
        $this->currency = $currency;
        return $this;
    }

    public function getCurrency() :?string
    {
        return $this->currency;
    }

    public function setFeatured($featured) :self
    {
        $this->featured = $featured;
        return $this;
    }

    public function isFeatured() :?bool
    {
        return $this->featured;
    }

    public function serialize()
    {
        return serialize([
            $this->id,
            $this->name,
            $this->price,
            $this->currency,
            $this->category != null ? $this->category->getName() : null
        ]);
    }

    public function unserialize($serialized)
    {
        
    }
}