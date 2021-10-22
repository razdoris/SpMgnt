<?php

namespace App\Repository;

use App\Entity\PresentationBlogCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PresentationBlogCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method PresentationBlogCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method PresentationBlogCategory[]    findAll()
 * @method PresentationBlogCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PresentationBlogCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PresentationBlogCategory::class);
    }
}
