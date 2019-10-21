<?php
namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * ProjetRepository
 */
class ProjetRepository extends \Doctrine\ORM\EntityRepository
{
    public function getProjets($parent, $avance)
    {
        $query = $this->createQueryBuilder('p')
            ->select('p')
            ->where('p.parent = :parent')
            ->andwhere('p.avancement = :avance')
            ->setParameter('parent', $parent)
            ->setParameter('avance', $avance)
            ->getQuery()
        ;
        $projets = $query->getResult();
        return $projets;
    }

    public function getParents()
    {
        $query = $this->createQueryBuilder('p')
            ->add('select', 'p.parent')
            ->getQuery()
        ;
        $result = $query->getArrayResult();
        return $result;
    }

    public function getAvancement()
    {
        $query = $this->createQueryBuilder('p')
            ->add('select', '(p.avancement)')
            ->getQuery()
        ;
        $result = $query->getArrayResult();
        return $result;
    }
}