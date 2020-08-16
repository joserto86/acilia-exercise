<?php 

namespace App\Service;

use App\Entity\Product;
use App\Repository\ProductRepository;

class ProductService
{
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getProductById(int $id) :?Product
    {
        return $this->productRepository->getProductById($id);
    }

    public function getProducts()
    {
        return $this->productRepository->getAllProducts();
    }

    public function getFeaturedProducts()
    {
        return $this->productRepository->getFeaturedProducts();
    }

    public function saveProduct(Product $product) :bool
    {
        return $this->productRepository->saveProduct($product);
    }
}