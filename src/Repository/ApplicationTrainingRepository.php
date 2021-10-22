<?php

namespace App\Repository;

use App\Entity\ApplicationTraining;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApplicationTraining|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApplicationTraining|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApplicationTraining[]    findAll()
 * @method ApplicationTraining[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApplicationTrainingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApplicationTraining::class);
    }
}
