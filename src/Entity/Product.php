<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Swagger\Annotations as SWG;
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
     * @ORM\Column(type="string", length=50) 
     * @SWG\Property(type="string")
     * */
    protected $name;

    // /** 
    //  * @ORM\ManyToOne(targetEntity="Acilia\Entity\Category")
    //  * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
    //  *
    //  * @SWG\Property(ref=@Model(type=Category::class))
    //  */
    // protected $category;

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

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setFeatured($featured)
    {
        $this->featured = $featured;
    }

    public function isFeatured()
    {
        return $this->featured;
    }
}