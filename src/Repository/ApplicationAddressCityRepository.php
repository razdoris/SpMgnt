<?php

namespace App\Repository;

use App\Entity\ApplicationAddressCity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApplicationAddressCity|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApplicationAddressCity|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApplicationAddressCity[]    findAll()
 * @method ApplicationAddressCity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApplicationAddressCityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApplicationAddressCity::class);
    }
}
