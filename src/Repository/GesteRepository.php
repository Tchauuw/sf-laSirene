<?php

namespace App\Repository;

use App\Entity\Geste;
use App\Entity\Tag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Geste>
 *
 * @method Geste|null find($id, $lockMode = null, $lockVersion = null)
 * @method Geste|null findOneBy(array $criteria, array $orderBy = null)
 * @method Geste[]    findAll()
 * @method Geste[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GesteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Geste::class);
    }

/*    public function findTags(Tag $tags) {
        $qb = $this->createQueryBuilder('geste')
            ->select('geste')
            ->innerJoin('tags', 't')
            ->where('g.tags=:tags')
            ->setParameter('tags',$tags);
        return $qb->getQuery()->getResult();
    }*/

//    /**
//     * @return Geste[] Returns an array of Geste objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Geste
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
