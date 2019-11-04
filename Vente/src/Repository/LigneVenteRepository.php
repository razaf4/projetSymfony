<?php

namespace App\Repository;

use App\Entity\LigneVente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method LigneVente|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneVente|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneVente[]    findAll()
 * @method LigneVente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneVenteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LigneVente::class);
    }

    // /**
    //  * @return LigneVente[] Returns an array of LigneVente objects
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
    public function findOneBySomeField($value): ?LigneVente
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
