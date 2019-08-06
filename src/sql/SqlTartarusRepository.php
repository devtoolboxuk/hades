<?php

namespace devtoolboxuk\hades\sql;

use devtoolboxuk\hades\tartarus\TartarusLog;
use devtoolboxuk\hades\tartarus\TartarusRepository as dtbTartarusRepository;
use Doctrine\DBAL\Types\Type;

class SqlTartarusRepository extends Repository implements dtbTartarusRepository
{

    public function __construct()
    {
        $this->setConnection();
    }

    public function checkTartarus(TartarusLog $log)
    {
        $queryBuilder = $this->getConn()->createQueryBuilder();
        $query = $queryBuilder
            ->select(
                'ip_address',
                'type',
                'comment',
                'created'
            )
            ->from('tartarus')
            ->Where('ip_address = :ip_address')
            ->setMaxResults(1)
            ->setParameter('ip_address', $log->getIpAddress(), Type::INTEGER)
            ->execute();

        $tartarus = [];
        while ($data = $query->fetch()) {
            $tartarus = $data;
        }

        return $tartarus;
    }

    public function removeTemporaryBan(TartarusLog $log)
    {
        $queryBuilder = $this->getConn()->createQueryBuilder();
        $queryBuilder
            ->delete('tartarus')
            ->Where('ip_address = :ip_address')
            ->setParameter('ip_address', $log->getIpAddress(), Type::INTEGER)
            ->execute();
    }
}