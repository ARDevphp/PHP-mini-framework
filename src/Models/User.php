<?php

declare(strict_types=1);

namespace src\Models;

use vendor\myFramework\Model;

class User extends Model
{
    public array $data = [
        'email' => null,
        'firstname' => null,
        'lastname' => null,
        'password' => null,
        'role' => 'admin'
    ];

    public function tableName(): string
    {
        return 'user';
    }

    public function save(): void
    {
        $sql = "insert into onlinemarket.{$this->TableName()} (email, firstname, lastname, password, role)
                value (:email, :firstname, :lastname, :password, :role)";
        $state = $this->db->prepare($sql);
        $state->bindValue(':email', $this->data['email']);
        $state->bindValue(':firstname', $this->data['firstname']);
        $state->bindValue(':lastname', $this->data['lastname']);
        $state->bindValue(':password', $this->data['password']);
        $state->bindValue(':role', $this->data['role']);
        $state->execute();
    }
}