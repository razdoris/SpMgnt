<?php

namespace App\Repository;

use App\Entity\ApplicationAddressDepartment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApplicationAddressDepartment|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApplicationAddressDepartment|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApplicationAddressDepartment[]    findAll()
 * @method ApplicationAddressDepartment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApplicationAddressDepartmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApplicationAddressDepartment::class);
    }
}
