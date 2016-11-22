<?php

namespace Oktolab\DelorianBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;

class EpisodeRepository extends EntityRepository {

    public function findEpisodeByFileInformation($abbreviation, $season, $episode_number)
    {
        $query = $this->getEntityManager()->createQuery(
            "SELECT e FROM OktolabDelorianBundle:Episode e
            LEFT JOIN e.series s
            WHERE e.seasonNumber = :season
            AND e.episodeNumber = :episode
            AND s.abbrevation = :abbreviation"
        )->setParameter('season', $season)
        ->setParameter('episode', $episode_number)
        ->setParameter('abbreviation', $abbreviation);

        try {
            return $query->getSingleResult();
        } catch (NonUniqueResultException $e) {
            return sprintf("%s%sx%s", $abbreviation, $season, $episode_number);
        } catch (NoResultException $e) {
            return sprintf("%s%sx%s", $abbreviation, $season, $episode_number);
        }
    }
}

 ?>
