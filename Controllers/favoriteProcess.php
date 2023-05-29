<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pokemonData = $_POST['data'];


    $response = "Les données du Pokémon ont été vérifiées.";
    echo $response;

    var_dump($pokemonData);

}
