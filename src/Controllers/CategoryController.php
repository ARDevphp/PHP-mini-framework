<?php

declare(strict_types=1);

namespace src\Controllers;

use src\Models\Category;
use vendor\myFramework\Controller;

class CategoryController extends Controller
{
    function list(string $error = null): void
    {
        $category = new Category();

        $pageListCount = $category->getPageCount();
        $result = $category->getList();

        $this->setViews('category/list',
            [
                'list' => $result,
                'page' => $pageListCount,
                'error' => $error
            ]
        );
    }

    public function add(): void
    {
        $category = new Category();

        if (isset($_POST['name'])) {
            $category->data['name'] = $_POST['name'];
            $category->save();
            $this->list();
        } else {
            $this->setViews('category/createCategory');
        }
    }

    public function update(): void
    {
        $category = new Category();

        if (isset($_POST['name'])) {
            $category->data['id'] = $this->getId();
            $category->data['name'] = $_POST['name'];

            $category->update();
            $this->list();
        } else {
            $result = $category->getRowById($this->getId());
            $this->setViews('category/update', ["category" => $result]);
        }
    }

    public function delete(): void
    {
        $category = new Category();

        if ($this->getId()) {
            if (isset($_POST['yes'])) {
                $error = $category->delete();

                $this->list($error);
            }

            if (isset($_POST['no'])) {
                $this->list();
            }
            $this->setViews('category/delete');
        }
    }
}
