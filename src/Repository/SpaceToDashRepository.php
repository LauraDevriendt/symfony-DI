<?php

namespace App\Repository;

use App\Entity\SpaceToDash;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SpaceToDash|null find($id, $lockMode = null, $lockVersion = null)
 * @method SpaceToDash|null findOneBy(array $criteria, array $orderBy = null)
 * @method SpaceToDash[]    findAll()
 * @method SpaceToDash[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpaceToDashRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SpaceToDash::class);
    }

    // /**
    //  * @return SpaceToDash[] Returns an array of SpaceToDash objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SpaceToDash
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
