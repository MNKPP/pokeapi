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
    <link rel="stylesheet" href="../style.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <link rel="stylesheet" href="../Styles/styles.css">
    <title>Favorite</title>
</head>

<body>
    <nav>
        <img src="../Img/Pokemon-Logo.png" alt="pokemon logo">
        <ul>
            <a href="../index.php">
                <li>Home</li>
            </a>
        </ul>
    </nav>
    <h1>My favorites</h1>
    <?php if (!empty($pokemonData)) : ?>
        <?php foreach ($pokemonData as $value) : ?>
            <div class="test">
                <div id="poke-info">
                    <h2 id="name"><?= $value->name ?></h2>
                    <img id="pokemon-img" src="<?= $value->url ?>">
                    <button class="deleteFavorite" data-id="<?= $value->id ?>">X</button>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
<script>
    $(document).ready(function() {
        $(".deleteFavorite").click(function() {
            var pokemonContainer = $(this).closest("#poke-info");
            var id = $(this).data("id");

            $.ajax({
                url: "../Controllers/favoriteDelete.php ",
                type: "POST",
                data: {
                    id: id
                },
                success: function(response) {
                    pokemonContainer.remove();
                },
                error: function() {
                    console.log("La suppression du Pokémon a échoué !");
                }
            });
        });
    });
</script>

</html>