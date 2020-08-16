<?php 

namespace App\Service;

use App\Entity\Product;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use App\Service\CurrencyService;
use Exception;

class ProductService
{
    public function __construct(
        ProductRepository $productRepository, 
        CategoryRepository $categoryRepository,
        CurrencyService $currencyService
    )
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->currencyService = $currencyService;
    }

    public function getProductById(int $id) :?Product
    {
        return $this->productRepository->getProductById($id);
    }

    public function getProducts() :array
    {
        return $this->productRepository->getAllProducts();
    }

    public function getFeaturedProducts(string $currency) :array
    {
        if ($currency != null && !$this->isCurrencyCorrect($currency))
        {
            throw new Exception();
        }
        
        $products = $this->productRepository->getFeaturedProducts();
        foreach ($products as $product)
        {
            if ($currency != null && \strcmp($currency, $product->getCurrency()) !== 0)
            {
                $product->setPrice($this->getPriceByCurrency(
                    $currency, 
                    $product->getPrice()
                ));
            }
        }

        return $products;

    }

    public function saveProduct(Product $product) :bool
    {
        if (!$this->isValidProduct($product)) {
            return false;
        }
        
        if ($product->getCategoryId() != null) {
            $category = $this->categoryRepository->getCategoryById($product->getCategoryId());
            if ($category != null) {
                $product->setCategory($category);
            }
        }

        return $this->productRepository->saveProduct($product);
    }

    private function isValidProduct(Product $product) :bool
    {
        if (!$this->isCurrencyCorrect($product->getCurrency())) {
            return false;
        }

        return true;
    }

    private function isCurrencyCorrect(string $currency) :bool
    {
        return \strcmp($currency, CurrencyService::USD) === 0 || \strcmp($currency, CurrencyService::EUR) === 0;
    }

    private function getPriceByCurrency($currency, $currentPrize) :float
    {
        if (\strcmp($currency, CurrencyService::USD) === 0) {
            return $this->currencyService->getUSDPrize($currentPrize);
        }

        if (\strcmp($currency, CurrencyService::EUR) === 0) {
            return $this->currencyService->getEURPrize($currentPrize);
        }

        return $currentPrize;
    }
}