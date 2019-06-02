<?php

namespace devtoolboxuk\hades\repositories;

use devtoolboxuk\hades\Log\TartarusModel;

interface TartarusRepository
{
    public function add(TartarusModel $record);

    public function get(TartarusModel $record);
}
