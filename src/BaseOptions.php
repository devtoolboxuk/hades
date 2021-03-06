<?php

namespace devtoolboxuk\hades;

class BaseOptions
{
    /**
     * ban_period - The amount of time to ban the users
     * interval
     * infractions - If the number of infractions have been met, ban the user
     * ban - True / False. If false, done add to Tartarus
     * type - Base infractions on type and IP (1) or just IP (0)
     * @return array
     */
    public function getOptions()
    {
        return [
            'Hades' => [
                'ban_period' => '86400',
                'interval' => '3000',
                'infractions' => 1,
                'score' => 100,
                'ban' => 1,
                'type' => 1,
            ]
        ];
    }
}