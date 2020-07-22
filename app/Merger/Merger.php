<?php

namespace App\Merger;

class Merger
{
    public static function instance(array $fileNames): MergerInterface
    {
        return new CsvMerger($fileNames);
    }
}