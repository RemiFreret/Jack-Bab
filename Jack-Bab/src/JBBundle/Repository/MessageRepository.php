<?php

namespace JBBundle\Repository;

/**
 * MessageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MessageRepository extends \Doctrine\ORM\EntityRepository
{
    public function findLast(){
        $qb = $this->createQueryBuilder('e');
        $qb -> orderBy('e.time','DESC');
        return $qb->getQuery()->setMaxResults(10)->getResult();
    }
}