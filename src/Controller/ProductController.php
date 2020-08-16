<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Response;
use App\Form\CategoryType;
use App\Form\ProductType;
use App\Service\ProductService;
use Exception;
use FOS\RestBundle\View\View;

class ProductController extends AbstractFOSRestController
{
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    
    /**
     * Retrieves all featured Products
     * @Rest\Get("/product/featured")
     */
    public function getFeaturedProductsAction()
    {
        try {
            $products = $this->productService->getFeaturedProducts();
            return View::create($products, Response::HTTP_OK);

        } catch(Exception $ex) {
            return View::create(null, Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Retrieves a Product resource
     * @Rest\Get("/product/{id}")
     */
    public function getProductAction(int $id)
    {
        try {
            $product = $this->productService->getProductById($id);
            if ($product != null) {
                return View::create($product, Response::HTTP_OK);
            }

            return View::create(null, Response::HTTP_NOT_FOUND);

        } catch(Exception $ex) {
            return View::create(null, Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Retrieves all Products
     * @Rest\Get("/product")
     */
    public function getProductsAction()
    {
        try {
            $products = $this->productService->getProducts();
            return View::create($products, Response::HTTP_OK);

        } catch(Exception $ex) {
            return View::create(null, Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Create a new Category resource
     * @Rest\Post("/product")
     */
    public function postProductAction(Request $request)
    {
        try {
            $product = new Product();
            $form = $this->createForm(ProductType::class, $product);
            $data = json_decode($request->getContent(),true);
            $form->submit($data);
            if ($form->isSubmitted() && $form->isValid())
            {
                $this->productService->saveProduct($product);
                return View::create(null, Response::HTTP_CREATED);
            }   
            return View::create($form->getErrors(), Response::HTTP_BAD_REQUEST);

        } catch (Exception $ex)
        {
            var_dump($ex);
            return View::create(null, Response::HTTP_BAD_REQUEST);
        }
    }
}