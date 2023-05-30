<?php
require_once "../autoload.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $pokemonDataJSON = $_POST['data'];

    $pokemonData = json_decode($pokemonDataJSON, true);

    $name = $pokemonData['forms'][0]['name'];
    $url = $pokemonData['sprites']['front_default'];

    if (isset($name) && isset($url)) {
        $pokemon = new Pokemon(null, $name, $url);
        $pokemon->save();
    } else {
        echo "CAPOUT";
    }
}
