<?php

namespace App\Creator;

class CsvCreator implements CreatorInterface
{
    private $targetFileName;
    private $sourceFileNames;

    public function __construct(string $targetFilename, array $sourceFileNames)
    {
        $this->targetFileName = $targetFilename;
        $this->sourceFileNames = $sourceFileNames;
    }

    public function save(): void    // method for saving merged data to new csv file
    {
        $fp = fopen($this->getTargetFileName(), 'w');//output file set here
        $merger = merge($this->getSourceFileNames());   // creating new CsvMerger instance
        foreach ($merger->merge() as $fields) {     // adding data to new csv file
            fputcsv($fp, $fields);
        }
        fclose($fp);
    }

    // getter methods for class properties
    public function getTargetFileName(): string
    {
        return $this->targetFileName;
    }

    public function getSourceFileNames(): array
    {
        return $this->sourceFileNames;
    }
}