<?php

namespace App;

class CsvReader
{
    public static $headers = [];

    private $fileName;

    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }

    public function read()
    {
        $handle = fopen($this->getFileName(), "r");
        $entry = 0;

        while (($item = fgetcsv($handle)) !== false) {

            if ($entry === 0) {
                self::$headers = $item;
                $entry++;
                continue;
            };
            yield $item;
        }
    }
}