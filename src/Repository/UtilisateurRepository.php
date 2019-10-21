<?php
namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * UtilisateurRepository
 */
class UtilisateurRepository extends \Doctrine\ORM\EntityRepository
{
    public function getIdUtils()
    {
        $query = $this->createQueryBuilder('u')
            ->add('select', 'u.idUtil')
            ->getQuery()
        ;
        $result = $query->getArrayResult();
        return $result;
    }
}