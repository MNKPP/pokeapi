<?php
require('autoload.php');

$pokemon = new Pokemon(1, "Pikachu", "fausse url");

echo $pokemon->__toString();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>

    <script src="index.js"></script>
</body>

</html>