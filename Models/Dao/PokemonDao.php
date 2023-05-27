<?php

class PokemonDao extends Dao
{
    public function __construct()
    {
        parent::__construct("pokemon");
    }

    public function create($data)
    {
        if (empty($data["id"])) {
            return false;
        }
        return new Pokemon(
            $data["id"] ?? false,
            $data["name"] ?? false,
            $data["url"] ?? false,
            false
        );
    }
}
