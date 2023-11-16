<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV to Json</title>
</head>

<body>
    <h1>CSV to Json</h1>
    <form action="result.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="file">Drop your file :</label>
            <input type="file" name="fileUpload" id="fileUpload" accept=".csv">
        </div>
        <input type="submit" name="submit" value="Télécharger">
    </form>
</body>

</html>