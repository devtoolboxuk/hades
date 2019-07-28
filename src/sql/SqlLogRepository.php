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

    public function addLog(AsphodelLog $log)
    {
        $queryBuilder = $this->getConn()->createQueryBuilder();
        $queryBuilder
            ->insert('tartarus')

            ->setParameters([
                'ip_address', $log->getIpAddress(), Type::INTEGER,
                'reference', $log->getReference(), Type::STRING,
                'type', $log->getType(), Type::STRING,
                'comment', $log->getComment(), Type::STRING,
            ])
            ->execute();
    }

    public function countInfractions(AsphodelLog $log)
    {

        $query = $this->getConn()->createQueryBuilder()
            ->select(
                'ip_address',
                'score',
                'type'
            )
            ->from('hades_log')
            ->Where('ip_address = :ip_address')
            ->Where('updated_at > :date')
            ->setParameter('ip_address', $log->getIpAddress(), Type::INTEGER)
            ->setParameter('date', $log->getDate(), Type::DATETIME)
            ->execute();

        $log = [];
        while ($data = $query->fetch()) {
            $log = $data;
        }

        return $log;
    }
}