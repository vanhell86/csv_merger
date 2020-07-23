<?php

namespace Tests;

use App\Creator\CsvCreator;
use PHPUnit\Framework\TestCase;

class CsvCreatorTest extends TestCase
{
    public function testGetTagetFileName(): void
    {
        $creator = new CsvCreator('final.csv', ['1.csv', '2.csv']);
        $this->assertEquals('final.csv', $creator->getTargetFileName());
    }

    public function testGetSourceFileNames(): void
    {
        $creator = new CsvCreator('final.csv', ['1.csv', '2.csv']);
        $this->assertEquals(['1.csv', '2.csv'], $creator->getSourceFileNames());
    }
}