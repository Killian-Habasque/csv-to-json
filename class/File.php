<?php

class File
{
    public function getExtension($filename)
    {
        return pathinfo($filename, PATHINFO_EXTENSION);
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
                $xml_cnt = file_get_contents($dataFile);
                $xml = simplexml_load_string($xml_cnt);
                $rows = [];
                foreach ($xml->row as $valueContent) {
                    $array = [];
                    foreach ($valueContent as $key => $column) {
                        $array[$key] = (string)$column;
                    }
                    $rows[] = $array;
                }

                $jsondata = json_encode($rows); 
                return $jsondata;

                break;
        }
    }

    public function getName($filename)
    {
        return pathinfo($filename, PATHINFO_FILENAME);
    }

    public function createStorageFile()
    {
        if (!file_exists("storage")) {
            mkdir('storage', 0777, true);
        }
    }

    public function checkFileExist($filename)
    {
        if (file_exists("storage/" . $filename . ".json")) {
            $i = 0;
            while (file_exists("storage/" . $filename . ".json")) {
                $i++;
                if ($i !== 1) {
                    $filename = trim($filename, "_mRwC2j78_" . $i - 1);
                }
                $filename = $filename . "_mRwC2j78_" . $i;
            }
        }
        return $filename;
    }

    public function uploadFile($filename, $file)
    {
        file_put_contents("storage/" . $filename  . ".json", $file);
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
