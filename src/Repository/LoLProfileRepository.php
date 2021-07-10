<?php

namespace App\Repository;

use App\Entity\LoLProfile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LoLProfile|null find($id, $lockMode = null, $lockVersion = null)
 * @method LoLProfile|null findOneBy(array $criteria, array $orderBy = null)
 * @method LoLProfile[]    findAll()
 * @method LoLProfile[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LoLProfileRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LoLProfile::class);
    }

    // /**
    //  * @return LoLProfile[] Returns an array of LoLProfile objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LoLProfile
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
