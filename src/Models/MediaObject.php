<?php

declare(strict_types=1);

namespace src\Models;

use PDO;
use vendor\myFramework\Model;
use vendor\myFramework\SaveToDatabaseInterface;

class MediaObject extends Model implements SaveToDatabaseInterface
{
    private string $file_path;

    public function TableName(): string
    {
        return 'media_object';
    }

    public function save(): void
    {

        $sql = "INSERT INTO onlinemarket.{$this->TableName()} (file_path) value (:file_path)";
        $state = $this->db->prepare($sql);
        $state->bindValue(':file_path', $this->getFilePath());
        $state->execute();
    }

    public function update(): void
    {
        $sql = "UPDATE onlinemarket.{$this->TableName()} SET file_path = :file_path WHERE id = :id";
        $state = $this->db->prepare($sql);
        $state->bindValue(':id', $this->getId(), PDO::PARAM_INT);
        $state->bindValue(':file_path', $this->getFilePath());
        $state->execute();
    }
    public function getFilePath(): string
    {
        return $this->file_path;
    }

    public function setFilePath(string $file_path): void
    {
        $this->file_path = $file_path;
    }
}