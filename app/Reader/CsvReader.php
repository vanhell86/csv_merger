<?php

namespace App\Reader;

use Generator;

class CsvReader implements ReaderInterface
{
    public static $headers = [];

    private $fileName;

    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
    }

    public function read(): Generator   // method for reading csv file
    {
        $handle = fopen($this->getFileName(), "r"); // opening file in read mode
        $entry = 0;

        while (($item = fgetcsv($handle)) !== false) {  // reads csv file, while thera are some data

            if ($entry === 0) { // saving first line to header array
                self::$headers = $item;
                $entry++;
                continue;
            };
            yield $item;    // generator read 1 line at a time
        }
    }
    // getter method for class property
    public function getFileName(): string
    {
        return $this->fileName;
    }
}