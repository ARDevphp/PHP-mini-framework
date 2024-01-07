<?php

use src\Models\BookCategory;
use src\Models\MediaObject;
use src\Models\User;

$bookCategory = new BookCategory();
$media = new MediaObject();
$user = new User();

/**
 * @var $bookCategory
 * @var $user
 * @var $book
 */

$bookCate = [];
$username = [];
$books = [];
$image = [];

foreach ($book as $item) {
    $books = $item;
}

foreach ($bookCategory->getRowById($books->bookCategoryId) as $item) {
    $bookCate['name'] = $item->name;
}

foreach ($user->getRowById($books->authorId) as $item) {
    $username[0] = $item->firstname;
    $username[0] .= " " . $item->lastname;
}

foreach ($media->getRowById($books->image_id) as $item) {
    $image[0] = $item->file_path;
}

?>

<div class="">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 mt-3">
                <img class="asd" src="/Views/image/istockphoto-1210557301-170667a.webp">

                <h4 class="add mt-3 mb-3 text-center">UPDATE BOOK</h4>
                <form method="post">
                    <div>
                        <label>Book name</label>
                        <input type="text" class="text form-control mt-1" name="name" value="<?= $books->name ?>">
                    </div>

                    <div>
                        <label class="mt-3">Text</label>
                        <textarea class="text1 form-control mt-1 mb-3" name="text"><?= $books->text ?></textarea>
                    </div>

                    <div>
                        <label class="mt-3">Book Category</label>
                        <select class="text form-control" name="bookCategory" >
                            <option value="<?= $books->bookCategoryId?>"><?= $bookCate['name']?></option>
                            <?php foreach ($bookCategory->getListTables() as $item) {
                                echo "<option value = '$item->id'>" . $item->name . "</option >";
                            } ?>
                        </select>
                    </div>

                    <div>
                        <label class="mt-3">Author</label>
                        <select class="text form-control" name="author">
                            <option value="<?= $books->authorId ?>"><?= $username[0]?></option>
                            <?php foreach ($user->getListTables() as $item) {
                                echo "<option value='$item->id'>" . $item->firstname . " " . $item->lastname . "</option>";
                            } ?>
                        </select>
                    </div>

                    <div>
                        <label class="mt-3">image</label>
                        <input type="file" class="text form-control mt-1" name="file" value="<?= $image[0] ?>">
                    </div>

                    <button class="btn1 btn mt-3" name="update">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .asd {
        display: block;
        justify-content: center;
        margin: 0 auto;
        width: 200px;
        height: 180px;
        top: 80px;
        border-radius: 55px;
    }

    .text {
        height: 33px;
        border: solid 1px;
    }

    .text1 {
        border: solid 1px;
    }

    .add {
        display: block;
        justify-content: center;
        text-justify: auto;
        cursor: pointer;
        color: #ff0026;
    }

    .btn1 {
        cursor: pointer;
        background: chartreuse;
        width: 545px;
    }

    .btn1:hover {
        color: azure;
    }

    .add:hover {
        color: black;
    }
</style>

