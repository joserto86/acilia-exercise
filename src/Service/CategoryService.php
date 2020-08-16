<?php 

namespace App\Service;

use App\Repository\CategoryRepository;
use App\Entity\Category;
use App\Repository\ProductRepository;

class CategoryService
{
    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function getCategoryById(int $id) :?Category
    {
        return $this->categoryRepository->getCategoryById($id);
    }

    public function saveCategory(Category $category) :bool
    {
        return $this->categoryRepository->saveCategory($category);
    }

    public function updateCategory(int $id, Category $category) :bool
    {
        $currentCategory = $this->getCategoryById($id);
        if ($currentCategory != null) {
            $currentCategory->setName($category->getName());
            $currentCategory->setDescription($category->getDescription());
            return $this->saveCategory($currentCategory);
        }

        return false;
    }

    public function deleteCategory(int $id) :bool
    {
        $currentCategory = $this->getCategoryById($id);
        if ($currentCategory != null) {
            $productsOfCategory = $this->productRepository->getProductsByCategoryId($id);
            if ($productsOfCategory != null) {
                return false;
            }

            return $this->categoryRepository->removeCategory($currentCategory);
        }

        return false;
    }
}