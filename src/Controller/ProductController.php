<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Response;
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
    public function getFeaturedProductsAction(Request $request) :View
    {
        try {
            $currency = $request->query->get('currency');
            $products = $this->productService->getFeaturedProducts($currency);
            return View::create($products, Response::HTTP_OK);

        } catch(Exception $ex) {
            return View::create(null, Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Retrieves a Product resource
     * @Rest\Get("/product/{id}")
     */
    public function getProductAction(int $id) :View 
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
    public function getProductsAction() :View
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
    public function postProductAction(Request $request) :View
    {
        try {
            $product = new Product();
            $form = $this->createForm(ProductType::class, $product);
            $data = json_decode($request->getContent(),true);
            $form->submit($data);
            if ($form->isSubmitted() && $form->isValid())
            {
                $result = $this->productService->saveProduct($product);
                if ($result)
                {
                    return View::create(null, Response::HTTP_CREATED);
                }
            }   
            return View::create($form->getErrors(), Response::HTTP_BAD_REQUEST);

        } catch (Exception $ex)
        {
            return View::create(null, Response::HTTP_BAD_REQUEST);
        }
    }
}