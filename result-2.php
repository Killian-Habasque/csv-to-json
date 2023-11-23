<?php

require_once 'class/File.php';


if (isset($_FILES['fileUpload'])) {

    if(empty($_POST['convertmode'])) {
        header('Location: version-2.php');
        exit;
    }

    $file = new File();

    $json = $file->convertFile($_FILES['fileUpload']['tmp_name'], 'json');
    $filename = $file->getName($_FILES['fileUpload']['name']);
    $file->getName($_FILES['fileUpload']['name']);
    $file->createStorageFile();
    $uploadFilename = $file->checkFileExist($filename, 'json');
    $file->uploadFile($uploadFilename, $json, 'json');

    $file->downloadFile($filename, $json, 'json');

} else {
    header('Location: index.php');
    exit;
}
