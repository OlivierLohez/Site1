<?php

namespace App\Repository;

use App\Entity\CarteIdentite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CarteIdentite|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarteIdentite|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarteIdentite[]    findAll()
 * @method CarteIdentite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarteIdentiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarteIdentite::class);
    }

    // /**
    //  * @return CarteIdentite[] Returns an array of CarteIdentite objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CarteIdentite
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
