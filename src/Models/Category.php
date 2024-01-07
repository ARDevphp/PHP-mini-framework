<?php

declare(strict_types=1);

namespace src\Models;

use PDO;
use vendor\myFramework\Model;
use vendor\myFramework\SaveToDatabaseInterface;

class Category extends Model implements SaveToDatabaseInterface
{
    public array $data = [
        'id' => null,
        'name' => null
    ];

    public function TableName(): string
    {
        return 'category';
    }

    public function save(): void
    {
        $sql = "INSERT INTO onlinemarket.{$this->TableName()} (name) values (:name)";
        $state = $this->db->prepare($sql);
        $state->bindValue(":name", $this->data['name']);

        $state->execute();
    }

    public function update(): void
    {
        $sql = "UPDATE onlinemarket.{$this->TableName()} SET name = :name where id = :id";
        $state = $this->db->prepare($sql);
        $state->bindValue(":id", $this->data['id'], PDO::PARAM_INT);
        $state->bindValue(":name", $this->data['name']);
        $state->execute();
    }
}
