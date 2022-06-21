<?php

namespace App\Repository;


use App\Entity\Club;
use App\Entity\Sport;
use App\Data\SearchData;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Sport>
 *
 * @method Sport|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sport|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sport[]    findAll()
 * @method Sport[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sport::class);
    }

    public function add(Sport $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Sport $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    
    // /**
    //  * Récupère les sports en lien avec une recherche
    //  * @return Sport[]
    //  */
    // public function findSearch(SearchData $search): array
    // {
    //     $query = $this
    //         ->createQueryBuilder('c')
    //         ->select('club')
    //         ->join('c.sports', 's');

    //         if (!empty($search->q)) {
    //             $query = $query
    //                 ->andWhere('sport.name LIKE :q')
    //                 ->setParameter('q', "%{$search->q}%");
    //         }

    //         if (!empty($search->sport)) {
    //             $query = $query
    //                 ->andWhere('s.id IN (:sport)')
    //                 ->setParameter('sport', $search->sport);
    //         }

    //     return $query->getQuery()->getResult();
    // }

}
