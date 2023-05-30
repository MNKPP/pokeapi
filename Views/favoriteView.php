<?php
require "../autoload.php";

$pokemonData = Pokemon::all();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorite</title>
</head>

<body>
    <h1>My favorites</h1>
    <?php foreach ($pokemonData as $value) : ?>
        <div id="poke-info">
            <h2 id="name"><?= $value->name ?></h2>
            <img id="pokemon-img" src="<?= $value->url ?>">
        </div>
    <?php endforeach; ?>
</body>

</html>