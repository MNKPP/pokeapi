<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pokemonData = $_POST['pokemonData'];


    $response = "Les données du Pokémon ont été vérifiées.";
    echo $response;
}
