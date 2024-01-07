<?php

declare(strict_types=1);

namespace src\Models;

use PDO;
use vendor\myFramework\Model;
use vendor\myFramework\SaveToDatabaseInterface;

class BookCategory extends Model implements SaveToDatabaseInterface
{
    public array $data = [
        'id' => null,
        'name' => null,
        'categoryId' => null
    ];
    public function TableName(): string
    {
        return 'bookCategory';
    }

    public function save(): void
    {
        $sql = "INSERT INTO onlinemarket.{$this->TableName()} (name, categoryId) value (:name, :categoryId)";
        $state = $this->db->prepare($sql);
        $state->bindValue(':name', $this->data['name']);
        $state->bindValue(':categoryId', $this->data['categoryId']);
        $state->execute();
    }

    public function update(): void
    {
        $sql = "UPDATE onlinemarket.bookcategory SET name = :name, categoryId = :categoryId where id = :id";
        $state = $this->db->prepare($sql);
        $state->bindValue(':id', $this->data['id'], PDO::PARAM_INT);
        $state->bindValue(':name', $this->data['name']);
        $state->bindValue(':categoryId', $this->data['categoryId']);

        $state->execute();
    }
}