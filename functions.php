<?php

use App\Creator\Creator;
use App\Merger\Merger;
use App\Reader\Reader;

function read(string $fileName) // returning Reader instance, currently CsvReader
{
    return Reader::instance($fileName);
}

function merge(array $fileNames) // returning Merger instance, currently CsvMerger
{
    return Merger::instance($fileNames);
}

function create(string $fileName, array $fileNames) // returning Creator instance, currently CsvCreator
{
    return Creator::instance($fileName, $fileNames);
}