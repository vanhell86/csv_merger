<?php

include __DIR__ . '/../vendor/autoload.php';

$csvCreator = create('final.csv', ['one.csv', 'two.csv', 'three.csv']);
$csvCreator->save();