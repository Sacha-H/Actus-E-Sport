<?php

namespace App\Repository;

use App\Entity\Esport;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Esport|null find($id, $lockMode = null, $lockVersion = null)
 * @method Esport|null findOneBy(array $criteria, array $orderBy = null)
 * @method Esport[]    findAll()
 * @method Esport[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EsportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Esport::class);
    }

    // /**
    //  * @return Esport[] Returns an array of Esport objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Esport
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
