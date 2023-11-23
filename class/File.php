<?php

class File
{
    public $storageFolder = "storage";
    public $fileKey = "_mRwC2j78_";
    
    public function getExtension($filename)
    {
        return pathinfo($filename, PATHINFO_EXTENSION);
    }

    public function getName($filename)
    {
        return pathinfo($filename, PATHINFO_FILENAME);
    }

    public function getFileContent($uploadFilename)
    {
        return file_get_contents($this->storageFolder . "/" . $uploadFilename . ".json");
    }

    public function createStorageFile()
    {
        if (!file_exists($this->storageFolder)) {
            mkdir($this->storageFolder, 0777, true);
        }
    }

    public function checkFileExist($filename)
    {
        if (file_exists($this->storageFolder . "/" . $filename . ".json")) {
            $i = 0;
            while (file_exists($this->storageFolder . "/" . $filename . ".json")) {
                $i++;
                if ($i !== 1) {
                    $filename = trim($filename, $this->fileKey . $i - 1);
                }
                $filename = $filename . $this->fileKey  . $i;
            }
        }
        return $filename;
    }
    
    public function convertFile($dataFile, $ext)
    {
        switch ($ext) {
            case "csv":
                $csv = file_get_contents($dataFile);
                $csvArray = explode("\n", $csv);
                $valueContent = array_map("str_getcsv", $csvArray);

                $keys = $valueContent[0];
                $nbLine = count($valueContent);

                for ($i = 1; $i < $nbLine; $i++) {
                    foreach ($valueContent[$i] as $key => $column) {
                        $array[$i][$keys[$key]] = $column;
                    }
                }
                $json = json_encode($array, JSON_PRETTY_PRINT);
                return $json;
                break;
            case "xml":
                $xml = file_get_contents($dataFile);
                $xml = simplexml_load_string($xml);

                $json = json_encode($xml); 
                return $json;
                break;
        }
    }

    public function uploadFile($filename, $file)
    {
        file_put_contents($this->storageFolder . "/" . $filename  . ".json", $file);
    }

    public function downloadFile($defaultFilename, $file)
    {
        header("Content-Type: application/force-download");
        header("Content-Type: application/download");
        header("Content-disposition: " . $defaultFilename . ".json");
        header("Content-disposition: filename=" . $defaultFilename . ".json");

        print $file;
        exit;
    }
}
