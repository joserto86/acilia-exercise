<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $em)
    {
        $this->em = $em;
        parent::__construct($registry, Product::class);
    }
    
    public function getAllProducts() :array
    {
        return $this->findAll();
    }

    public function getFeaturedProducts() :array
    {
        return $this->findBy(['featured' => true]);
    }

    public function getProductsByCategoryId($categoryId) :array
    {
        return $this->createQueryBuilder('p')
            ->join('p.category', 'c')
            ->where('c.id = :cat')
            ->setParameter('cat', $categoryId)
            ->getQuery()
            ->getResult();
    }

    public function getProductById(int $id) :?Product
    {
        return $this->find($id);
    }

    public function saveProduct(Product $product) :bool
    {
        $this->em->persist($product);
        $this->em->flush();
        return true;
    }
}