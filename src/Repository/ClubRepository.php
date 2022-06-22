<?php

namespace App\Repository;

use App\Entity\Club;
use App\Data\SearchData;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Club>
 *
 * @method Club|null find($id, $lockMode = null, $lockVersion = null)
 * @method Club|null findOneBy(array $criteria, array $orderBy = null)
 * @method Club[]    findAll()
 * @method Club[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClubRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Club::class);
    }

    public function add(Club $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Club $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    /**
     * Récupère les sports en lien avec une recherche
     * @return Club[]
     */
    public function findSearch(SearchData $search): array
    {
        $query = $this
            ->createQueryBuilder('c')
            ->select('c', 's', 'cn')
            ->join('c.sport', 's')
            ->join('c.country', 'cn');
            // dd($query->getQuery()->getResult());

            if (!empty($search->q)) {
               
                $query = $query
                    ->andWhere('s.name LIKE :q')
                    ->setParameter('q', "%{$search->q}%");
            }

            if (!empty($search->sport)) {
                $query = $query
                    ->andWhere('s.id IN (:sport)')
                    ->setParameter('sport', $search->sport);
            }

            if (!empty($search->club)) {
                $query = $query
                    ->andWhere('c.id IN (:club)')
                    ->setParameter('club', $search->club);
            }

            if (!empty($search->country)) {
                $query = $query
                    ->andWhere('cn.id IN (:country)')
                    ->setParameter('country', $search->country);
                
            }
            // dd($query->getQuery()->getResult()) ;
        return $query->getQuery()->getResult();
    }
  
}
