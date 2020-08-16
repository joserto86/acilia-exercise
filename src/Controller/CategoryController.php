<?php

namespace App\Controller;

use App\Entity\Category;
use App\Service\CategoryService;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Response;
use App\Form\CategoryType;
use Exception;
use FOS\RestBundle\View\View;

class CategoryController extends AbstractFOSRestController
{ 
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    
    /**
     * Retrieves a Category resource
     * @Rest\Get("/category/{id}")
     */
    public function getCategoryAction(int $id) :View
    {
        try {
            $category = $this->categoryService->getCategoryById($id);
            if ($category != null) {
                return View::create($category, Response::HTTP_OK);
            }

            return View::create(null, Response::HTTP_NOT_FOUND);

        } catch(Exception $ex) {
            return View::create(null, Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Create a new Category resource
     * @Rest\Post("/category")
     */
    public function postCategoryAction(Request $request) :View
    {
        try {
            $category = new Category();
            $form = $this->createForm(CategoryType::class, $category);
            $data = json_decode($request->getContent(),true);
            $form->submit($data);
            if ($form->isSubmitted() && $form->isValid())
            {
                $result = $this->categoryService->saveCategory($category);
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

    /**
     * Replaces a Category resource
     * @Rest\Put("/category/{id}")
     */
    public function putCategoryAction(int $id, Request $request) :View
    {
        try {
            $category = new Category();
            $form = $this->createForm(CategoryType::class, $category);
            $data = json_decode($request->getContent(),true);
            $form->submit($data);
            if ($form->isSubmitted() && $form->isValid())
            {
                $result = $this->categoryService->updateCategory($id, $category);
                if ($result) {
                    return View::create(null, Response::HTTP_OK);
                }
            }   

            return View::create($form->getErrors(), Response::HTTP_BAD_REQUEST);
        } catch (Exception $ex)
        {
            return View::create(null, Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Retrieves an Article resource
     * @Rest\Delete("/category/{id}")
     */
    public function deleteCategoryAction(int $id) :View
    {
        try {
            $result = $this->categoryService->deleteCategory($id);
            if ($result)
            {
                return View::create(null, Response::HTTP_NO_CONTENT);
            }

            return View::create(null, Response::HTTP_NOT_FOUND);

        } catch (Exception $ex) {
            return View::create(null, Response::HTTP_BAD_REQUEST);
        }
    }
}