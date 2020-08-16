<?php 

namespace App\Service;

use App\Entity\Product;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;

class ProductService
{
    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
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
        if ($product->getCategoryId() != null) {
            $category = $this->categoryRepository->getCategoryById($product->getCategoryId());
            if ($category != null) {
                $product->setCategory($category);
            }
        }

        return $this->productRepository->saveProduct($product);
    }
}