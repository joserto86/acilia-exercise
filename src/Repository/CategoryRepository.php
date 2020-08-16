<?php

namespace App\Repository;

use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

class CategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $em)
    {
        $this->em = $em;
        parent::__construct($registry, Category::class);
    }
    
    public function getCategoryById($id) :?Category
    {
        return $this->find($id);
    }

    public function saveCategory(Category $category) :bool
    {
        $this->em->persist($category);
        $this->em->flush();
        return true;
    }

    public function removeCategory(Category $category) :bool
    {
        $this->em->remove($category);
        $this->em->flush();
        return true;
    }
}