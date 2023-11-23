<?php
require_once 'File.php';

class ConvertInstance
{
    public $file;
    public $filename;
    public $uploadFilename;

    public function convert($fileUpload)
    {
        $this->file = new File();
        // obtenir l'extension du fichier
        $fileExt = $this->file->getExtension($fileUpload['name']);
        // convertir le fichier en fonction de l'extension
        $json = $this->file->convertFile($fileUpload['tmp_name'],  $fileExt);
        // obtenir le nom du fichier
        $this->filename = $this->file->getName($fileUpload['name']);
        // création du dossier de stockage
        $this->file->createStorageFile();
        // vérifier si le fichier existe et retourne le nom upload
        $this->uploadFilename = $this->file->checkFileExist($this->filename);
        // upload du fichier
        $this->file->uploadFile($this->uploadFilename, $json);
    }
    public function download()
    {
        // récupération du contenu du fichier
        $json = $this->file->getFileContent($this->uploadFilename);
        // téléchargement du fichier
        $this->file->downloadFile($this->filename, $json);
    }  
}
