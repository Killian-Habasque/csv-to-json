<?php
require_once 'class/ConvertInstance.php';

$instance = new ConvertInstance();


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV/ XML to Json</title>
</head>

<body>
    <h1>CSV/ XML to Json</h1>

    <form action="result-2.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="file">Drop your file :</label>
            <input type="file" name="fileUpload" id="fileUpload" accept=".csv">
        </div>
        <select name="convertmode">
            <?php
            foreach ($instance->exts as $column) {
                echo '<option value="' . $column . '">' . $column . '</option>';
            }
            ?>
        </select>
        <input type="submit" name="submit" value="Télécharger">
    </form>
</body>

</html>