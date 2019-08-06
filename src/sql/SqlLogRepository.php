<?php

namespace devtoolboxuk\hades\sql;

use devtoolboxuk\hades\asphodel\AsphodelLog;
use devtoolboxuk\hades\asphodel\AsphodelRepository;
use Doctrine\DBAL\Types\Type;

class SqlLogRepository extends Repository implements AsphodelRepository
{

    public function __construct()
    {
        $this->setConnection();
    }

    public function addToLog(AsphodelLog $log)
    {

        $queryBuilder = $this->getConn()->createQueryBuilder();
        $queryBuilder
            ->insert('hades_log')
            ->values([
                'ip_address'=>':ip_address',
                'score'=>':score',
                'reference'=>':reference',
                'type'=>':type',
                'comment'=>':comment'
            ])

            ->setParameter('ip_address', $log->getIpAddress(), Type::INTEGER)
            ->setParameter('score', $log->getScore(), Type::INTEGER)
            ->setParameter('reference', $log->getReference(), Type::STRING)
            ->setParameter('type', $log->getType(), Type::STRING)
            ->setParameter('comment', $log->getComment(), Type::STRING)
            ->execute();
    }

    public function getInfractions(AsphodelLog $log)
    {

        $query = $this->getConn()->createQueryBuilder()
            ->select(
                'score',
                'type'
            )
            ->from('hades_log')
            ->Where('ip_address = :ip_address')
            ->andWhere('created > :date')
            ->setParameter('ip_address', $log->getIpAddress(), Type::INTEGER)
            ->setParameter('date', $log->getCreated())
            ->execute();

        $log = [];
        while ($data = $query->fetch()) {
            $log[] = $data;
        }

        return $log;
    }
}