<?php
spl_autoload_register(function ($class) {
    if (strpos($class, "DAO") !== false) {
        require_once("Models/Dao/{$class}.php");
    } else if (strpos($class, "Controller") !== false) {
        require_once("Controllers/{$class}.php");
    } else {
        require_once("Models/Entities/{$class}.php");
    }
});
