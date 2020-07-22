<?php

namespace App\Reader;

class Reader
{
    public static function instance(string $fileName): ReaderInterface
    {
        return new CsvReader($fileName);
    }
}