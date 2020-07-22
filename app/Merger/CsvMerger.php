<?php

namespace App\Merger;

class CsvMerger implements MergerInterface
{
    private $finalCsvHeader = [];
    private $finalCsvData = [];
    private $finalCsv = [];
    private $fileNames = [];

    public function __construct(array $fileNames)
    {
        $this->fileNames = $fileNames;
    }

    public function merge(): array  // method for merging csv files
    {
        foreach ($this->fileNames as $csvFile) {
            $reader = read($csvFile);  //creating Csvreader instance and passing file to read

            foreach ($reader->read() as $key => $item) {
                // getting header with unique values
                $this->setFinalCsvHeader(array_unique(array_merge($this->getFinalCsvHeader(),
                    $reader::$headers)));
                $record = array_combine($reader::$headers, $item);  // creating key => value pairs
                $this->setFinalCsvData($record); // collecting all csv data to array
            }
        }

        $this->setFinalCsv($this->getFinalCsvHeader()); //adding header to finalCsv array
        foreach ($this->getFinalCsvData() as $data) {   // looping through all collected csv data

            $row = [];
            $value = "''";
            foreach ($this->getFinalCsvHeader() as $column) { // looping through header columns and checking
                if (isset($data[$column])) {                  // if there is such data, if not adding empty string
                    $value = $data[$column];
                }
                $row[] = $value;
                $value = "''";
            }
            $this->setFinalCsv($row);   // adding data to finalCsv array
        }
        return $this->getFinalCsv();
    }

//    setting getters and setters for class properties
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