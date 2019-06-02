<?php

namespace devtoolboxuk\hades;

use PHPUnit\Framework\TestCase;

class TartarusTest extends TestCase
{

    function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    function testTarturus()
    {

        $hades = new FirewallService(
        );
        $hades->checkTartarus();
    }

}
