<?php

namespace Tests;

use App\Reader\CsvReader;
use PHPUnit\Framework\TestCase;

class CsvReaderTest extends TestCase
{
    public function testGetFileName(): void
    {
        $reader = new CsvReader('test.csv');
        $this->assertEquals('test.csv', $reader->getFileName());
    }
}