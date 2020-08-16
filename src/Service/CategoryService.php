<?php 

namespace App\Service;

use App\Repository\CategoryRepository;
use App\Entity\Category;

class CategoryService
{
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getCategoryById(int $id) :?Category
    {
        return $this->categoryRepository->getCategoryById($id);
    }

    public function saveCategory(Category $category) :bool
    {
        $this->categoryRepository->saveCategory($category);
        return true;
    }

    public function updateCategory(int $id, Category $category) :bool
    {
        $currentCategory = $this->getCategoryById($id);
        if ($currentCategory != null) {
            $currentCategory->setName($category->getName());
            $currentCategory->setDescription($category->getDescription());
            $this->saveCategory($currentCategory);
            
            return true;
        }

        return false;
    }

    public function deleteCategory(int $id) :bool
    {
        $currentCategory = $this->getCategoryById($id);
        if ($currentCategory != null) {
            return $this->categoryRepository->removeCategory($currentCategory);
            return true;
        }

        return false;
    }
}