<?php

use src\Models\Category;

$cate = new Category();

/**
 * @var $categoryList
 * @var $error
 * @var $list
 */
?>

<h3 class="cate mt-3 text-center">
    BOOK CATEGORY INFORMATION
</h3>

<div class="container">
    <div class="row justify-content-center">
        <div class="mt-5">
            <form method="post">
                <div class="input-group">
                    <a class="btn btn-danger mb-3" href="/category/list">Ortga<<</a>
                    <div class="col-8">
                        <input
                            type="text"
                            name="name"
                            id="form1"
                            class="form-control"
                            style="height: 39px"
                            placeholder="Book category name"
                        />
                    </div>
                    <select
                        aria-label="Default select example"
                        name='bookCategoryName'
                        style="height: 39px"
                        class="form-select"
                    >
                        <option>Select Category</option>
                        <?php
                        foreach ($categoryList as $item) {
                            echo "<option value='" . $item->id . "'>" . $item->name . "</option>";
                        }
                        ?>
                    </select>
                    <button type="submit" name="bookCreate" class="btn btn-success" style="height: 39px">Create</button>
                </div>
            </form>
        </div>
    </div>
    <div class="" style="color: red">
        <?= $error ?>
    </div>
    <div class="col mt-3">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-warning">
            <tr>
                <th scope="col">#id</th>
                <th scope="col">Book Category Name</th>
                <th scope="col">Category Name</th>
                <th scope="col">
                    <a class="btn" style="background: aqua" href="/category/list?sort">
                        SORTING DATA
                    </a>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($list as $item) {

                echo "<tr>";
                echo "<td>" . $item->id . "</td>";
                echo "<td>" . $item->name . "</td>";

                foreach ($cate->getRowById($item->categoryId) as $itemId) {
                    echo "<td>" . $itemId->name . "</td>";
                }
                echo "<td>
                               <a 
                                    href='/BookCategory/update?id=" . $item->id . "' 
                                    class='btn btn-primary'
                               >
                                   <svg
                                        xmlns='http://www.w3.org/2000/svg' 
                                        width='16' 
                                        height='16' 
                                        fill='currentColor'
                                        class='bi bi-pencil-fill' 
                                        viewBox='0 0 16 16'
                                   >
                                         <path d='M12.854.146a.5.5 0 0 0-.707 
                                         0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5
                                          0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293
                                           9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 
                                           1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 
                                           13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 
                                           1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 
                                           5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'
                                           />
                                   </svg>
                                   UPDATE
                               </a>    
                               <a
                                href='/BookCategory/delete?id=" . $item->id . "' 
                                class='btn btn-danger'
                                >
                                   <svg xmlns='http://www.w3.org/2000/svg' 
                                        width='16'
                                        height='16'
                                        fill='currentColor'
                                        class='bi bi-trash' 
                                        viewBox='0 0 16 16'
                                   >
                                        <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 
                                        0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 
                                        0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z'
                                        />
                                        <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 
                                        2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 
                                        1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 
                                        4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 
                                        3h11V2h-11v1Z'
                                        />
                                    </svg>
                                    DELETE
                                </a>
                           </td>";
                echo "</tr>";
            } ?>
            </tbody>
        </table>
    </div>
</div>

<style>
    .cate {
        color: lawngreen;
    }
</style>
