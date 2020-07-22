<?php


namespace App;

class CsvCreator
{
    private $targetFileName;
    private $sourceFileNames;

    public function __construct(string $targetFilename, array $sourceFileNames)
    {
        $this->targetFileName =  $targetFilename;
        $this->sourceFileNames = $sourceFileNames;
    }

    public function save()
    {
        $fp = fopen($this->getTargetFileName(), 'w');//output file set here
        $merger = new CsvMerger($this->getSourceFileNames());
        foreach ($merger->merge() as $fields) {
            fputcsv($fp, $fields);
        }
        fclose($fp);
    }

    public function getTargetFileName(): string
    {
        return $this->targetFileName;
    }

    public function getSourceFileNames(): array
    {
        return $this->sourceFileNames;
    }
}