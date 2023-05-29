<?php

class PokemonDao extends Dao
{
    public function __construct()
    {
        parent::__construct("pokemon");
    }

    public function store($pokemon)
    {
        $statement = $this->db->prepare("INSERT INTO pokemon (name, url) VALUES (?, ?)");
        return parent::insert($statement, [$pokemon->name, $pokemon->url], $pokemon);
    }

    public function update($pokemon)
    {
        $statement = $this->db->prepare("UPDATE pokemon SET name = ?, url = ? WHERE id = ?");
        return parent::insert($statement, [$pokemon->name, $pokemon->url, $pokemon->id], $pokemon);
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
