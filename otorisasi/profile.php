<?php
session_start();

if ($_SESSION["role"] !== "user") {
    header("Location: index.php");
    exit();
}

$role = $_SESSION["role"];
$name = $_SESSION["name"]
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Selamat datang
        <?= "$role $name" ?>
    </h1>
</body>

</html>