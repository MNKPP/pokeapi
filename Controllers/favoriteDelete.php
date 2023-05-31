<?php
require "../autoload.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'] ?? null;

    $pokemon = Pokemon::find($id);
    $pokemon->delete();
}
