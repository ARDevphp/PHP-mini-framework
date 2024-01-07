<?php

declare(strict_types=1);

namespace src\Controllers;

use src\Models\User;
use vendor\myFramework\Controller;

class UserController extends Controller
{
    public function list(): void
    {
        $user = new User();

        $result = $user->getList();

        $this->setViews('user/list', ['list' => $result]);
    }

    public function addUser(): void
    {
        $user = new User();

        $result = $user->getList();

        $this->setViews('user/createUser', ['list' => $result]);
    }

    public function login(): void
    {
        $this->setViews('user/login');
    }

    public function register(): void
    {
        $user = new User();

        if (isset($_POST['email'])) {
            if (!empty($_POST['firstname']) && !empty($_POST['lastname'])) {
                if (isset($_POST['password']) === isset($_POST['configPassword'])) {
                    $password = $_POST['password'];

                    $user->data['email'] = $_POST['email'];
                    $user->data['firstname'] = $_POST['firstname'];
                    $user->data['lastname'] = $_POST['lastname'];
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $user->data['password'] = $password;

                    $user->save();
                    $this->setViews('user/list');
                }
            }
        }
        $this->setViews('user/register');
    }
}