<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Swagger\Annotations as SWG;
use Nelmio\ApiDocBundle\Annotation\Model;
use App\Entity\Category;

/**
* @ORM\Entity
* @ORM\Table(name="product")
*/
class Product 
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
     * */
    protected $name;

    /** 
     * @ORM\ManyToOne(targetEntity="App\Entity\Category")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     *
     * @SWG\Property(ref=@Model(type=Category::class))
     */
    protected $category;

    /** 
     * @ORM\Column(type="float") 
     * @SWG\Property(type="float")
     */
    protected $price;

    /** 
     * @ORM\Column(type="string", length=10) 
     * @SWG\Property(type="string")
     */
    protected $currency;

    /**
     * @ORM\Column(type="boolean")
     * @SWG\Property(type="boolean")
     */
    protected $featured;

    public function getId() :int
    {
        return $this->id;
    }

    public function setName($name) :Product
    {
        $this->name = $name;
        return $this;
    }

    public function getName() :string
    {
        return $this->name;
    }

    public function setCategory(Category $category) :Product
    {
        $this->category = $category;
        return $this;
    }

    public function getCategory() :Category
    {
        return $this->category;        
    }

    public function setPrice($price) :Product
    {
        $this->price = $price;
        return $this;
    }

    public function getPrice() :float
    {
        return $this->price;
    }

    public function setCurrency($currency) :Product
    {
        $this->currency = $currency;
        return $this;
    }

    public function getCurrency() :string
    {
        return $this->currency;
    }

    public function setFeatured($featured) :Product
    {
        $this->featured = $featured;
        return $this;
    }

    public function isFeatured() :bool
    {
        return $this->featured;
    }
}