<?php
include __DIR__ . '/vendor/autoload.php';

use App\CsvCreator;

$csvCreator = new CsvCreator('final.csv', array_slice($argv, 1));
$csvCreator->save();
