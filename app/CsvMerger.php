<?php

namespace App;

class CsvMerger
{
    private $finalCsvHeader = [];
    private $finalCsvData = [];
    private $finalCsv = [];
    private $fileNames = [];

    public function __construct(array $fileNames)
    {
        $this->fileNames = $fileNames;
    }

    public function merge()
    {
        foreach ($this->fileNames as $csvFile) {
            $reader = new CsvReader($csvFile);

            foreach ($reader->read() as $key => $item) {
                $this->setFinalCsvHeader(array_unique(array_merge($this->getFinalCsvHeader(),
                    $reader::$headers)));
                $record = array_combine(CsvReader::$headers, $item);
                $this->setFinalCsvData($record);
            }
        }

        $this->setFinalCsv($this->getFinalCsvHeader());
        foreach ($this->getFinalCsvData() as $data) {

            $row = [];
            $value = "''";
            foreach ($this->getFinalCsvHeader() as $column) {
//                $value = ($data[$column] ? $data[$column] : "''");
                if (isset($data[$column])) {
                    $value = $data[$column];
                }
                $row[] = $value;
                $value = "''";
            }
            $this->setFinalCsv($row);
        }
        return $this->getFinalCsv();
    }

    public function getFinalCsvHeader(): array
    {
        return $this->finalCsvHeader;
    }

    public function setFinalCsvHeader(array $finalCsvHeader): void
    {
        $this->finalCsvHeader = $finalCsvHeader;
    }

    public function getFinalCsvData(): array
    {
        return $this->finalCsvData;
    }

    public function setFinalCsvData(array $finalCsvData): void
    {
        $this->finalCsvData[] = $finalCsvData;
    }

    public function getFinalCsv(): array
    {
        return $this->finalCsv;
    }

    public function setFinalCsv(array $finalCsv): void
    {
        $this->finalCsv[] = $finalCsv;
    }
}