<?php

require_once 'class/ConvertInstance.php';


if (isset($_FILES['fileUpload'])) {

    $convertInstance = new ConvertInstance();
    $convertInstance->convert($_FILES['fileUpload']);

} else {
    header('Location: version-2.php');
    exit;
}
