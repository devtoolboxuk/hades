<?php

namespace devtoolboxuk\hades\sql;

use devtoolboxuk\storage\StorageManager;


abstract class Repository
{

    protected $conn = null;

    protected $db;

    /**
     * @param $db
     * @throws \Exception
     */
    protected function setConnection()
    {

        $connection_details = [
            'adapter' => 'mysql',
            'driver' => 'mysqli',
            'host' => 'database',
            'dbname' => '',
            'user' => 'root',
            'server' => 'https://www.local.com',
            'web_url' => 'https://www.local.com',
            'uri' => '',
            'password' => '',
            'port' => '3306',
            'charset' => 'utf8',
        ];


        $storage = new StorageManager($connection_details);
        $this->conn = $storage->getAdapter()->connection();
    }

    /**
     * @return null
     */
    protected function getConn()
    {
        return $this->conn;
    }
}