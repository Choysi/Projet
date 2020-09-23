<?php

namespace App\Repository;

use App\Entity\CategorieOeuvre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategorieOeuvre|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorieOeuvre|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorieOeuvre[]    findAll()
 * @method CategorieOeuvre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieOeuvreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorieOeuvre::class);
    }

    // /**
    //  * @return CategorieOeuvre[] Returns an array of CategorieOeuvre objects
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
    public function findOneBySomeField($value): ?CategorieOeuvre
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
