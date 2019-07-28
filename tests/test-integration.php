<?php

namespace devtoolboxuk\hades;

use devtoolboxuk\hades\Handlers\TartarusHandler;

use devtoolboxuk\hades\sql\SqlTartarusRepository;
use PHPUnit\Framework\TestCase;

class TartarusInteg extends TestCase
{

    function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    function testTarturus()
    {
        $hades = new FirewallService();

        $hades
           // ->setOptions()
            ->pushFireWallRepository(new SqlTartarusRepository()); //MySQL Tartarus Repository

        if ($hades->isBlocked('192.168.1.1')) {
            echo "\n";
            echo "IP is blocked";
            echo "\n";
        } else {
            echo "\n";
            echo "IP is not blocked";
            echo "\n";
        }
    }
}
