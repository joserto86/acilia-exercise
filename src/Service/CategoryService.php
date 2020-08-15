<?php 

namespace App\Service;

use App\Repository\CategoryRepository;

class CategoryService
{
    protected CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getCategoryById($id)
    {
        return $this->categoryRepository->getCategoryById($id);
    }
}