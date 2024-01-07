<?php

declare(strict_types=1);

namespace src\Controllers;

use src\Models\AutoCategory;
use src\Models\Category;
use vendor\myFramework\Controller;

class AutoCategoryController extends Controller
{
    private mixed $error = null;

    public function list(): void
    {
        $autoCategory = new AutoCategory();
        $category = new Category();

        $result = $autoCategory->getListTablesDesc();
        $categoryList = $category->getListTables();

        $this->setViews('autoCategory/list', [
            'categoryList' => $categoryList,
            'error' => $this->error,
            'list' => $result
        ]);
    }

    public function add(): void
    {
        $autoCategory = new AutoCategory();

        if (isset($_POST['autoCreate']) && isset($_POST['autoCategoryName'])) {
            $autoCateName = $_POST['autoCategoryName'];
            if (!empty($_POST['autoCreate'])) {

                if ($autoCateName === 'Select Category') {
                    $this->error = "Select a category";

                } else {
                    $autoCategory->data['name'] = $_POST['autoCreate'];
                    $autoCategory->data['categoryId'] = $autoCateName;
                    $autoCategory->save();
                }
            } else {
                $this->error = "Enter category name";
            }
        }

        $this->list();
    }

    public function update(): void
    {
        $autoCategory = new AutoCategory();
        $category = new Category();

        $autoCategoryName = $autoCategory->getRowById($this->getId());
        $getCategory = $category->getRowById($autoCategoryName[0]->categoryId);
        $getCategories = $category->getListTables();

        if (isset($_POST['name'])) {
            $autoCategory->data['id'] = $autoCategory->getId();
            $autoCategory->data['name'] = $_POST['name'];
            $autoCategory->data['categoryId'] = $_POST['autoCateUpdate'];

            $autoCategory->update();
            $this->list();
        }
        if (!isset($_POST['name'])) {

            $this->setViews('autoCategory/update',
                [
                    'autoCategoryName' => $autoCategoryName,
                    'getCategories' => $getCategories,
                    'getCategory' => $getCategory
                ]
            );
        } else {
            if (!empty($_POST['name'])) {
                $autoCategory->data['name'] = $autoCategory;
            }
        }
    }

    public function delete(): void
    {
        $autoCategory = new AutoCategory();

        if ($autoCategory->getId()) {

            if (isset($_POST['yes'])) {
                $autoCategory->delete();

                $this->list();
            } else if (isset($_POST['no'])) {
                $this->list();
            }

            $this->setViews('autoCategory/delete');
        }
    }
}
