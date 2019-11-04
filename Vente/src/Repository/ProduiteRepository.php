<?php

namespace App\Repository;

use App\Entity\Produite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Produite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produite[]    findAll()
 * @method Produite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produite::class);
    }

    // /**
    //  * @return Produite[] Returns an array of Produite objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Produite
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
