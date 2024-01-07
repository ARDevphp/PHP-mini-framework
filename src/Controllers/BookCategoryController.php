<?php

declare(strict_types=1);

namespace src\Controllers;

use src\Models\BookCategory;
use src\Models\Category;
use vendor\myFramework\Controller;

class bookCategoryController extends Controller
{
    private mixed $error = null;

    public function list(): void
    {
        $bookCategory = new BookCategory();
        $category = new Category();

        $result = $bookCategory->getListTablesDesc();
        $categoryList = $category->getListTables();

        $this->setViews('bookCategory/list', [
            'categoryList' => $categoryList,
            'error' => $this->error,
            'list' => $result
        ]);
    }

    public function add(): void
    {
        $bookCategory = new BookCategory();

        if (isset($_POST['bookCreate'])) {
            if (isset($_POST['name']) && isset($_POST['bookCategoryName'])) {
                $bookCateName = $_POST['bookCategoryName'];

                $bookCategory->data['name'] = $_POST['name'];
                $bookCategory->data['categoryId'] = $bookCateName;
                $bookCategory->save();
            } else {
                $this->error = "Enter category name";
            }
        }

        $this->list();
    }

    public function update(): void
    {
        $bookCategory = new BookCategory();
        $category = new Category();

        $bookCategoryName = $bookCategory->getRowById($this->getId());
        $getCategory = $category->getRowById($bookCategoryName[0]->categoryId);
        $getCategories = $category->getListTables();

        if (isset($_POST['name'])) {
            $bookCategory->data['id'] = $bookCategory->getId();
            $bookCategory->data['name'] = $_POST['name'];
            $bookCategory->data['categoryId'] = $_POST['bookCateUpdate'];

            $bookCategory->update();
            $this->list();
        }
        if (!isset($_POST['name'])) {

            $this->setViews('bookCategory/update',
                [
                    'bookCategoryName' => $bookCategoryName,
                    'getCategories' => $getCategories,
                    'getCategory' => $getCategory
                ]
            );
        } else {
            if (!empty($_POST['name'])) {
                $bookCategory->data['name'] = $bookCategory;
            }
        }
    }

    public function delete(): void
    {
        $bookCategory = new BookCategory();

        if ($bookCategory->getId()) {

            if (isset($_POST['yes'])) {
                $bookCategory->delete();

                $this->list();
            } else if (isset($_POST['no'])) {
                $this->list();
            }

            $this->setViews('bookCategory/delete');
        }
    }
}