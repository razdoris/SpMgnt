<?php

namespace App\Repository;

use App\Entity\ApplicationTeam;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApplicationTeam|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApplicationTeam|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApplicationTeam[]    findAll()
 * @method ApplicationTeam[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApplicationTeamRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApplicationTeam::class);
    }
}
