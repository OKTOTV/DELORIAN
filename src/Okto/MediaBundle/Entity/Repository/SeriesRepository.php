<?php
namespace Okto\MediaBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class SeriesRepository extends EntityRepository {

    public function findSeries($series_class, $query_only = false )
    {
        $query =  $this->getEntityManager()
                        ->createQuery('SELECT s, p FROM '.$series_class.' s LEFT JOIN s.posterframe p');
        if ($query_only) {
            return $query;
        }
        return $query->getResults();
    }
}
