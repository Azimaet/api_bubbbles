<?php

namespace App\Repository;

use App\Entity\Dive;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Dive|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dive|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dive[]    findAll()
 * @method Dive[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dive::class);
    }

    // /**
    //  * @return Dive[] Returns an array of Dive objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Dive
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
