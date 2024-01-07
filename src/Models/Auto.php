<?php

declare(strict_types=1);

namespace src\Models;

use vendor\myFramework\Model;
use PDO;
use vendor\myFramework\SaveToDatabaseInterface;

class Auto extends Model implements SaveToDatabaseInterface
{
    public array $data = [
        'id' => null,
        'name' => null,
        'info' => null,
        'sum' => null,
        'autoCategory' => null,
        'authorId' => null,
        'image_id' => null
    ];

    public function TableName(): string
    {
        return 'auto';
    }

    public function save(): void
    {
        $sql = "INSERT INTO onlinemarket.auto 
                (name, info, sum, autoCategoryId, authorId, image_id, visitedCount, createdAt) VALUE 
                (:name, :info, :sum, :autoCategoryId, :authorId, :image_id, :visitedCount, :createAt)";

        $state = $this->db->prepare($sql);
        $state->bindValue(':name', $this->data['name']);
        $state->bindValue(':info', $this->data['info']);
        $state->bindValue(':sum', $this->data['sum']);
        $state->bindValue(':autoCategoryId', $this->data['autoCategory']);
        $state->bindValue(':authorId', $this->data['authorId']);
        $state->bindValue(':image_id', $this->data['image_id']);
        $state->bindValue(':visitedCount', 2);
        $state->bindValue(':createAt', date('d-m-y H:i:s'));

        $state->execute();
    }

    public function update(): void
    {
        $sql = "UPDATE onlinemarket.auto SET 
                name = :name, info = :infos, sum = :sum, autoCategoryId = :autoCategoryId,
                authorId = :authorId, image_id = :image_id WHERE id = :id";

        $states = $this->db->prepare($sql);
        $states->bindValue(':id', $this->data['id'], PDO::PARAM_INT);
        $states->bindValue(':name', $this->data['name']);
        $states->bindValue(':infos', $this->data['info']);
        $states->bindValue(':sum', $this->data['sum']);
        $states->bindValue(':autoCategoryId', $this->data['autoCategory']);
        $states->bindValue(':authorId', $this->data['authorId']);
        $states->bindValue(':image_id', $this->data['image_id']);

        $states->execute();
    }
}

