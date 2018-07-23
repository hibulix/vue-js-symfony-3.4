<?php

namespace AppBundle\Repository;

/**
 * StatisticRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class StatisticRepository extends \Doctrine\ORM\EntityRepository
{
    public function myFindBy($type, $bot, $start, $end)
    {
        $qb = $this->createQueryBuilder('s')
            ->where('s.type = :type')
            ->setParameter('type', $type);

        if ('' !== $bot) {
            $qb->andWhere('bot = :bot')
                ->setParameter('bot', $bot);
        }

        if ('' !== $start) {
            $qb->andWhere('date >= :start')
                ->setParameter('start', "$start 00:00:00");
        }

        if ('' !== $end) {
            $qb->andWhere('date <= :end')->setParameter('end', "$end 23:59:59");
        }

        return $qb->getQuery()->getArrayResult();
    }
}
