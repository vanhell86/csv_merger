<?php

namespace App\Creator;

class Creator
{
    public static function instance(string $fileName, array $sourceFileNames): CreatorInterface
    {
        return new CsvCreator($fileName, $sourceFileNames);
    }
}