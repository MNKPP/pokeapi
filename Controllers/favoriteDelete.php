<?php
require "../autoload.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];

    $pokemon = Pokemon::find($id);
    if ($pokemon) {
        $pokemon->delete();
    }
}
