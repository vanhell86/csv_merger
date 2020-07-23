<?php

namespace Tests;

use App\Merger\CsvMerger;
use PHPUnit\Framework\TestCase;

class CsvMergerTest extends TestCase
{
    public function testGetFinalCsvHeader(): void
    {
        $merger = new CsvMerger(['1.csv', '2.csv']);
        $merger->setFinalCsvHeader(['name', 'surname']);
        $this->assertEquals(['name', 'surname'], $merger->getFinalCsvHeader());
    }

    public function testGetFinalCsvData(): void
    {
        $merger = new CsvMerger(['1.csv', '2.csv']);
        $merger->setFinalCsvData(
            [
                ['name' => 'John', 'surname' => 'Doe'],
                ['name' => 'Jane', 'surname' => 'Doe']
            ]);
        $this->assertEquals(
            [[
                ['name' => 'John', 'surname' => 'Doe'],
                ['name' => 'Jane', 'surname' => 'Doe']
            ]],
            $merger->GetFinalCsvData()
        );
    }

    public function testGetFinalCsv(): void
    {
        $merger = new CsvMerger(['1.csv', '2.csv']);
        $merger->setFinalCsvData([
            ['name' => 'John', 'surname' => 'Doe', 'street' => 'Street 123'],
            ['name' => 'Jane', 'surname' => 'Doe', 'street' => '']
        ]);
        $this->assertEquals([[
            ['name' => 'John', 'surname' => 'Doe', 'street' => 'Street 123'],
            ['name' => 'Jane', 'surname' => 'Doe', 'street' => '']
        ]],
            $merger->GetFinalCsvData());
    }
}
