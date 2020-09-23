<?php

namespace App\Repository;

use App\Entity\CategoriePrestation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategoriePrestation|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoriePrestation|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoriePrestation[]    findAll()
 * @method CategoriePrestation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoriePrestationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoriePrestation::class);
    }

    // /**
    //  * @return CategoriePrestation[] Returns an array of CategoriePrestation objects
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
    public function findOneBySomeField($value): ?CategoriePrestation
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
