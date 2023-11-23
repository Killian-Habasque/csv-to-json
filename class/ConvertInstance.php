<?php
require_once 'File.php';

class ConvertInstance
{
    public function convert($fileUpload)
    {
        $file = new File();
        $fileExt = $file->getExtension($fileUpload['name']);
        $json = $file->convertFile($fileUpload['tmp_name'],  $fileExt);
        $filename = $file->getName($fileUpload['name']);
        $file->getName($fileUpload['name']);
        $file->createStorageFile();
        $uploadFilename = $file->checkFileExist($filename);
        $file->uploadFile($uploadFilename, $json);
        $file->downloadFile($filename, $json);
    
    }
}
