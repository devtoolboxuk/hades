<?php

namespace devtoolboxuk\hades;

class BaseOptions
{

    /**
     * @return array
     */
    public function getOptions()
    {
        return [
            'Hades' => [
                'ban_period' => '86400',
                'interval' => '300',
                'failures' => '5',
                'frequency' => '300',
            ]
        ];
    }
}