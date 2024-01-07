<?php

declare(strict_types=1);

namespace src\Controllers;

use src\Models\Book;
use src\Models\BookCategory;
use src\Models\MediaObject;
use src\Models\User;
use vendor\myFramework\Controller;

class BookController extends Controller
{
    public function list(): void
    {
        $book = new Book();

        $result = $book->getList();
        $pageListCount = $book->getPageCount();

        $this->setViews('Book/list',
            [
                'list' => $result,
                'page' => $pageListCount
            ]);
    }

    public function createBook(): void
    {
        $category = new BookCategory();
        $media = new MediaObject();
        $book = new Book();
        $user = new User();

        $result = $category->getListTables();
        $users = $user->getList();

        if (isset($_POST['submit'])) {
            $media->setFilePath($_POST['file']);
            $media->save();
            $image = $media->getRowByName($_POST['file']);

            $book->data = [
                'category' => $_POST['bookCategory'],
                'author' => $_POST['author'],
                'image_id' => $image[0]->id,
                'text' => $_POST['text'],
                'name' => $_POST['name'],
            ];

            $book->save();
            $this->list();
        } else {
            $this->setViews('Book/createBook',
                [
                    'bookCategory' => $result,
                    'user' => $users
                ]
            );
        }
    }

    public function update(): void
    {
        $media = new MediaObject();
        $book = new Book();

        if ($book->getId()) {

            if (isset($_POST['update'])) {

                if ($media->getRowByName($_POST['file'])) {

                    $image = $media->getRowByName($_POST['file']);

                } else {

                    $media->setFilePath($_POST['file']);
                    $image = $media->getRowByName($_POST['file']);
                    $media->save();
                }

                $book->data = [
                    'id' => $book->getId(),
                    'category' => $_POST['bookCategory'],
                    'author' => $_POST['author'],
                    'image_id' => $image[0]->id,
                    'text' => $_POST['text'],
                    'name' => $_POST['name'],
                ];

                $book->update();
                $this->list();
            } else {

                $result = $book->getRowById($book->getId());
                $this->setViews('book/update', ['book' => $result]);
            }
        }
    }

    public function delete(): void
    {
        $book = new Book();

        if ($book->getId()) {

            if (isset($_POST['yes'])) {
                $book->delete();

                $this->list();
            } else if (isset($_POST['no'])) {
                $this->list();
            }

            $this->setViews('book/delete');
        }
    }
}
