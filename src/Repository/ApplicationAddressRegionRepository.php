<?php

namespace App\Repository;

use App\Entity\ApplicationAddressRegion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApplicationAddressRegion|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApplicationAddressRegion|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApplicationAddressRegion[]    findAll()
 * @method ApplicationAddressRegion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApplicationAddressRegionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApplicationAddressRegion::class);
    }

}
