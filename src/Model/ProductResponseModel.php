<?php

namespace App\Model;

use Symfony\Component\Serializer\Annotation\SerializedName;

class ProductResponseModel
{
    /**
     * @var int
     * @SerializedName("Id")
     */
    protected $id;

    /**
     * @var string
     * @SerializedName("Name")
     */
    protected $name;

    /**
     * @var float
     * @SerializedName("Price")
     */
    protected $price;

    /**
     * @var string
     * @SerializedName("Currency")
     */
    protected $currency;

    /**
     * @var string
     * @SerializedName("Category.Name")
     */
    protected $categoryName;

    public function __construct(int $id, string $name, float $price, string $currency, ?string $categoryName)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->currency = $currency;
        $this->categoryName = $categoryName;
    }

    public function setId(int $id) :self
    {
        $this->id = $id;
        return $this;
    }

    public function setName(string $name) :self
    {
        $this->name = $name;
        return $this;
    }

    public function setPrice(float $price) :self
    {
        $this->price = $price;
        return $this;
    }

    public function setCurrency(string $currency) :self
    {
        $this->currency = $currency;
        return $this;
    }

    public function setCategoryName(string $categoryName) :self
    {
        $this->categoryName = $categoryName;
        return $this;
    }

    public function getId() :int
    {
        return $this->id;
    }

    public function getName() :string
    {
        return $this->name;
    }

    public function getPrice() :float
    {
        return $this->price;
    }

    public function getCurrency() :string
    {
        return $this->currency;
    }

    public function getCategoryName() :?string
    {
        return $this->categoryName;
    }
}
