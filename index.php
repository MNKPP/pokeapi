<?php
require "autoload.php";
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
    <nav>
        <h1>Pokédex</h1>
        <ul>
            <a href="Views/favoriteView.php">
                <li>Favorites</li>
            </a>
        </ul>
    </nav>

    <form>
        <input type="text" id="pokemon" name="pokemon">
        <button id="findPokemon">Rechercher</button>
    </form>

    <div id="poke-info">
        <h2 id="name"></h2>
        <img id="pokemon-img" src="">
    </div>

    <script>
        let pokemonData;
        $(document).on("click", "#findPokemon", function(event) {
            event.preventDefault();

            var value = $("input").val();

            $.get("https://pokeapi.co/api/v2/pokemon/" + value)
                .done(function(data) {
                    pokemonData = data;
                    $('#name').text(data.name);
                    $('#pokemon-img').attr('src', data.sprites.front_default);

                    if ($(".addFavorite")) {
                        $(".addFavorite").remove();
                    }

                    $("#poke-info").append(
                        $(document.createElement("button")).prop({
                            className: "addFavorite",
                            href: "Controllers/favoriteProcess.php",
                            innerHTML: "Ajouter aux favoris"
                        })
                    )
                })
                .fail(function(error) {
                    console.log(error)
                });
        });

        $(document).on("click", ".addFavorite", function() {
            $.post("Controllers/favoriteProcess.php", {
                    data: JSON.stringify(pokemonData) // pokemonData
                })
                .done(function() {
                    console.log("success");
                })
                .fail(function(error) {
                    console.log(error);
                });
        });
    </script>
</body>

</html>