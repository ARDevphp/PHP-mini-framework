<?php

declare(strict_types=1);

$result = null;

foreach ($category as $item) {
    $result = $item->name;
}
?>

<div class="rol">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 mt-3">
                <h4 class="text-center">Kategorya O'zgartirish</h4>
                <form method="post">
                    <div class="form-group">
                        <input
                            type="text"
                            name="name"
                            class="form-control mb-3 "
                            id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            value="<?= $result ?>"
                        />
                    </div>
                    <div class="col d-flex justify-content-between">
                        <button type="submit" class="center btn btn-primary mb-3 w-25">Submit</button>
                        <a class="btn btn-success mb-3" href="/category/list"> Ortga << </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
