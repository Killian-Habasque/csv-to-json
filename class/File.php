<?php

class File
{

    public function convertFile($dataFile, $ext)
    {
        switch ($ext) {
            case "json":
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

    public function checkFileExist($filename, $ext)
    {
        if (file_exists("storage/" . $filename . "." . $ext)) {
            $i = 0;
            while (file_exists("storage/" . $filename . "." . $ext)) {
                $i++;
                if ($i !== 1) {
                    $filename = trim($filename, "_mRwC2j78_" . $i - 1);
                }
                $filename = $filename . "_mRwC2j78_" . $i;
            }
        }
        return $filename;
    }

    public function uploadFile($filename, $file, $ext)
    {
        file_put_contents("storage/" . $filename  . "." . $ext, $file);
    }

    public function downloadFile($defaultFilename, $file, $ext)
    {
        header("Content-Type: application/force-download");
        header("Content-Type: application/download");
        header("Content-disposition: " . $defaultFilename . "." . $ext);
        header("Content-disposition: filename=" . $defaultFilename . "." . $ext);

        print $file;
        exit;
    }
}
