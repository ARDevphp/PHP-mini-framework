<?php
/**
 * @var $auto
 * @var $users
 */
?>

<div class="">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 mt-3">
                <img class="asd"
                     src="/Views/image/1675486866_gas-kvas-com-p-fonovii-risunok-dlya-rabochego-stola-avto-11.jpg">
                <h4 class="add mt-3 mb-3 text-center">CREATE AUTO MODEL</h4>
                <form method="post" class="auto">
                    <div>
                        <label>Auto name</label>
                        <input type="text" class="text form-control mt-1" name="name">
                    </div>
                    <div>
                        <label class="mt-3">Auto info</label>
                        <textarea class="text1 form-control mt-1 mb-3" name="info"></textarea>
                    </div>
                    <label>Auto sum</label>
                    <div class="input-group">
                        <div class="col-8">
                            <input
                                type="number"
                                name="sum"
                                id="form1"
                                class="text form-control"
                                style="height: 33px"
                            />
                        </div>
                        <select
                            aria-label="Default select example"
                            name='value'
                            style="height: 33px"
                            class="text form-select"
                        >
                            <option value="so'm">so'm</option>
                            <option value="use">use</option>
                            <option value="rub">rub</option>
                            <option value="eur">eur</option>
                        </select>
                    </div>
                    <div>
                        <label class="mt-3">Auto Category</label>
                        <select class="text form-control" name="autoCategory">
                            <option>select category</option>
                            <?php foreach ($auto as $item) {
                                echo "<option value = '$item->id'>" . $item->name . "</option >";
                            } ?>
                        </select>
                    </div>
                    <div>
                        <label class="mt-3">author</label>
                        <select class="text form-control" name="author">
                            <option>select author</option>
                            <?php foreach ($users as $item) {
                                echo "<option value='$item->id'>" . $item->firstname . " " . $item->lastname . "</option>";
                            } ?>
                        </select>
                    </div>
                    <div>
                        <label class="mt-3">image</label>
                        <input type="file" class="text form-control mt-1" name="file">
                    </div>
                    <button class="btn1 btn mt-3" name="submit">Create</button>
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
        height: 120px;
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
