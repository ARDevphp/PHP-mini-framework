<?php

declare(strict_types=1);

namespace src\Controllers;

use src\Models\Auto;
use src\Models\AutoCategory;
use src\Models\MediaObject;
use src\Models\User;
use vendor\myFramework\Controller;

class AutoController extends Controller
{
    public function list(): void
    {
        $auto = new Auto();

        $result = $auto->getList();
        $pageListCount = $auto->getPageCount();

        $this->setViews(
            'auto/list',
            [
                'list' => $result,
                'page' => $pageListCount
            ]
        );
    }

    public function add(): void
    {
        $autoCategory = new AutoCategory();
        $media = new MediaObject();
        $auto = new Auto();
        $user = new User();

        if (isset($_POST['name']) && !empty($_POST['name'])) {
            if (!empty($_POST['info'])) {
                if (isset($_POST['sum']) && !empty($_POST['value'])) {
                    if (isset($_POST['file'])) {

                        $media->setFilePath($_POST['file']);
                        $media->save();
                        $file = $media->getRowByName($_POST['file']);

                        $auto->data['name'] = $_POST['name'];
                        $auto->data['info'] = $_POST['info'];
                        $auto->data['sum'] = $_POST['sum'];
                        $auto->data['sum'] .= " " . $_POST['value'];
                        $auto->data['authorId'] = $_POST['author'];
                        $auto->data['autoCategory'] = $_POST['autoCategory'];
                        $auto->data['image_id'] = $file[0]->id;

                        $auto->save();
                        $this->list();
                    }
                }
            }
        } else {
            $auto = $autoCategory->getListTables();
            $users = $user->getListTables();
            $this->setViews('auto/createAuto',
                [
                    'auto' => $auto,
                    'users' => $users
                ]
            );
        }
    }

    public function update(): void
    {
        $media = new MediaObject();
        $auto = new Auto();

        if ($auto->getId()) {

            if (isset($_POST['update'])) {
                if ($media->getRowByName($_POST['file'])) {
                    $image = $media->getRowByName($_POST['file']);

                } else {
                    $media->setFilePath($_POST['file']);
                    $image = $media->getRowByName($_POST['file']);
                    $media->save();
                }

                $auto->data = [
                    'id' => $auto->getId(),
                    'name' => $_POST['name'],
                    'info' => $_POST['text'],
                    'sum' => $_POST['sum'],
                    'autoCategory' => $_POST['autoCate'],
                    'authorId' => $_POST['author'],
                    'image_id' => $image[0]->id,
                ];

                $auto->update();
                $this->list();
            } else {
                $result = $auto->getRowById($auto->getId());

                $this->setViews('auto/update', ['list' => $result]);
            }
        }
    }

    public function delete(): void
    {
        $auto = new Auto();

        if ($auto->getId()) {

            if (isset($_POST['yes'])) {
                $auto->delete();

                $this->list();
            } else if (isset($_POST['no'])) {
                $this->list();
            }

            $this->setViews('auto/delete');
        }
    }
}
