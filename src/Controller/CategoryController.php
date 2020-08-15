<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use App\Service\CategoryService;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    protected CategoryService $categoryService;
    
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    
    /**
     * @Route("/category/{id}", methods={"GET"})
     * @SWG\Response(
     *     response=200,
     *     description= "Returns category by Id",
     *     @Model(type=Category::class)
     * )
     */
    public function get($id)
    {
        return new JsonResponse($this->categoryService->getCategoryById($id));
    }
    
    /**
     * @Route("/category", methods={"POST"})
     * @SWG\Response(
     *     response=201,
     *     description= "Returns featured products",
     *     @Model(type=Category::class)
     * )
     * @SWG\Parameter(
     *     name="category",
     *     @Model(type=Category::class),
     *     description="The field used to order rewards"
     * )
     */
    public function new(Request $request)
    {
        return new JsonResponse(true);
    }
}