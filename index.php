<?php
include __DIR__ . '/vendor/autoload.php';

$csvCreator = create('final.csv', array_slice($argv, 1));
$csvCreator->save();
