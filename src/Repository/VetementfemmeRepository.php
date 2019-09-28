<?php

namespace App\Repository;

use App\Entity\vetementfemme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method vetementfemme|null find($id, $lockMode = null, $lockVersion = null)
 * @method vetementfemme|null findOneBy(array $criteria, array $orderBy = null)
 * @method vetementfemme[]    findAll()
 * @method vetementfemme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VetementfemmeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, vetementfemme::class);
    }

    // /**
    //  * @return vetementfemme[] Returns an array of vetementfemme objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?vetementfemme
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
