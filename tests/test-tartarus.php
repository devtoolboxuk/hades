<?php

namespace devtoolboxuk\hades;

use devtoolboxuk\utilitybundle\UtilityService;
use PHPUnit\Framework\TestCase;

class TartarusTest extends TestCase
{

    function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    function testTarturus()
    {

        $utility = new UtilityService();

        echo "\n\nYeterday: ".$yesterday = $utility->date()->modify('-86400 seconds');
    echo "\n\n";
    echo "\n\n";
        if ($utility->date()->datePassed($yesterday))
        {
            echo "Date has passed";
        }
    echo "\n\n";
    }

}
