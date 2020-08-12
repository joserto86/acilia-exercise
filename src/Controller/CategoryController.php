<?php

namespace App\Controller;

use App\Entity\Category;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * 
     * 
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
    public function new($request)
    {
        
    }
}