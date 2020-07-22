<?php

namespace App\Reader;

use Generator;

interface ReaderInterface
{
    public function read(): Generator;
}