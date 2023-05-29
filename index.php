<?php
require('autoload.php');

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
    <div id="poke-info">
        <h2 id="name"></h2>
        <img id="pokemon" src="">
    </div>

    <script>
        let pokemonData;
        $.get("https://pokeapi.co/api/v2/pokemon/94")
            .done(function(data) {
                pokemonData = data;
                $('#name').text(data.name);
                $('#pokemon').attr('src', data.sprites.front_default);

                $("#poke-info").append(
                    $(document.createElement("button")).prop({
                        href: "Controllers/favoriteProcess.php",
                        innerHTML: "Ajouter aux favoris"
                    })
                )

                $(document).on("click", "button", function() {
                    $.post("Controllers/favoriteProcess.php", {
                            data: pokemonData
                        })
                        .done(function() {
                            console.log("success")
                        })
                        .fail(function(error) {
                            console.log(error);
                        })
                })
            })
            .fail(function(error) {
                console.log(error)
            })
    </script>
</body>

</html>