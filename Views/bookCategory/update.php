<?php

declare(strict_types=1);

/**
 * @var $bookCategoryName
 * @var $getCategories
 * @var $getCategory
 */

$getCate = null;
$result = null;

foreach ($bookCategoryName as $item) {
    $result = $item->name;
}

foreach ($getCategory as $item) {
    $getCate['id'] = $item->id;
    $getCate['name'] = $item->name;
}

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 mt-3">
            <h4 class="text-center">Kategorya O'zgartirish</h4>
            <form method="post">
                <div class="input-group">
                    <div class="col-8 form">
                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            value="<?= $result ?>"
                        />
                    </div>
                    <select class="form-select" name='bookCateUpdate' aria-label="Default select example">
                        <option value="<?= $getCate['id'] ?>"><?= $getCate['name'] ?></option>

                        <?php foreach ($getCategories as $item) {
                            echo "<option value='$item->id'>" . $item->name . "</option>";
                        } ?>

                    </select>
                </div>
                <div class="col d-flex justify-content-between mt-4">
                    <button type="submit" class="center btn btn-primary mb-3 w-25">Submit</button>
                    <a class="btn btn-danger mb-3" href="/bookCategory/list"> Ortga << </a>
                </div>
            </form>
        </div>
    </div>
</div>


