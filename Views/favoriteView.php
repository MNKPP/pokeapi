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
    <title>Favorite</title>
</head>

<body>
    <h1>My favorites</h1>
    <?php foreach ($pokemonData as $value) : ?>
        <div class="test">
            <div id="poke-info">
                <h2 id="name"><?= $value->name ?></h2>
                <img id="pokemon-img" src="<?= $value->url ?>">
                <button class="deleteFavorite" data-id="<?= $value->id ?>">X</button>
            </div>
        </div>
    <?php endforeach; ?>
</body>
<script>
    $(document).ready(function() {
        $(".deleteFavorite").click(function() {
            var id = $(this).data("id");

            $.post("../Controllers/favoriteDelete.php", {
                    id: id
                })
                .done(function() {
                    console.log("success");
                })
                .fail(function(error) {
                    console.log(error);
                });
        });
    });
    // $("document").on("click", ".deleteFavorite", function() {
    //     var id = $(this).data("id");

    //     $.post("../Controllers/favoriteDelete.php", {
    //             id: id
    //         })
    //         .done(function(response) {
    //             console.log(response);
    //         })
    //         .fail(function(error) {
    //             console.log(error);
    //         })
    // });
</script>

</html>