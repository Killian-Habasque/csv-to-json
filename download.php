<?php
require_once 'class/ConvertInstance.php';
require_once 'class/File.php';
session_start();
if (isset($_SESSION["convertinstance"]) && !empty($_SESSION["convertinstance"])) {
    $_SESSION["convertinstance"]->download();
} else {
    header('Location: version-2.php');
    exit;
}
?>