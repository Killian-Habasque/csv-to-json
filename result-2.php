<?php

require_once 'class/ConvertInstance.php';

if (!isset($_SESSION["convertinstance"]) && empty($_SESSION["convertinstance"])) {
    if (isset($_FILES['fileUpload'])) {
        session_start();
        $convertInstance = new ConvertInstance();
        $convertInstance->convert($_FILES['fileUpload']);
        $_SESSION["convertinstance"] = $convertInstance;

?>
        <fieldset>
            <p>Fichier téléchargé : <?= $_SESSION["convertinstance"]->filename; ?></p>
            <br>
            <a href="download.php">Télécharger le fichier</a>
        </fieldset>

        <a href="version-2.php">Revenir à la conversion</a>
<?php
    } else {
        header('Location: version-2.php');
        exit;
    }
} else {
    header('Location: version-2.php');
    exit;
}
