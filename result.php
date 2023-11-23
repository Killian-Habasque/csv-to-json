<?php
if (isset($_FILES['fileUpload'])) {

    // convertion du csv à json
    $csv = file_get_contents($_FILES['fileUpload']['tmp_name']);
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

    // récupétation du nom du fichier
    $filename = pathinfo($_FILES['fileUpload']['name'], PATHINFO_FILENAME);
    $defaultFilename = $filename;
    
    // vérification de l'existance du dossier storage
    if (!file_exists("storage")) {
        mkdir('storage', 0777, true);
    }
    // vérification de son existance, si oui on lui rajoute un suffix "_mRwC2j78_..."
    // suffix choisi pour éviter que l'utiliseur rentre un ..._1 qui serait déjà existant
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
    // upload du json dans le dossier storage
    file_put_contents("storage/" . $filename  . ".json", $json);

    // ajout de l'entete de format de fichier
    header("Content-Type: application/force-download");
    header("Content-Type: application/download");
    header("Content-disposition: " . $defaultFilename . ".json");
    header("Content-disposition: filename=" . $defaultFilename . ".json");

    print $json;
    exit;
} else {
    header('Location: index.php');
    exit;
}
