<?php

use src\Models\AutoCategory;
use src\Models\MediaObject;
use src\Models\User;

$autoCategory = new AutoCategory();
$mediaObject = new MediaObject();
$user = new User();

/**
 * @var $list
 * @var $page
 */

?>

<h3 class="mt-5 mb-4 text-center" style="color: #FF00FF">
    AUTO INFORMATION
</h3>

<div class="container-fluid">
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-danger">
            <tr>
                <th scope="col">#id</th>
                <th scope="col">name</th>
                <th scope="col">marka</th>
                <th scope="col">sum</th>
                <th scope="col">Malumotlar</th>
                <th scope="col">author</th>
                <th scope="col"><a href="#" class="btn" style="background: darkturquoise">Sorting data</a></th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($list as $item) {
            echo "<tr>";
            echo "<td>" . $item->id . "</td>";
            echo "<td>" . $item->name . "</td>";

            foreach ($autoCategory->getRowById($item->autoCategoryId) as $itemAutoCate) {
                echo "<td>" . $itemAutoCate->name . "</td>";
            }

            echo "<td>" . $item->sum . "</td>";
            echo "<td>" . $item->info . "</td>";

            foreach ($user->getRowById($item->authorId) as $itemUser) {
                echo '<td >' . $itemUser->firstname . "</td>";
            }

            echo "<td>
                       <a href='/auto/update?id=" .$item->id . "' class='btn btn-primary'> 
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
                          Update
                      </a>
                      <a href='/auto/delete?id=" . $item->id . "' class='btn btn-danger'>
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
                              Delete
                      </a>
                  </td>";

            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
    <div>
        <a class="btn btn-primary" href="/auto/add">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                 class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1
                    0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"
                />
            </svg>
            Create Auto
        </a>
    </div>
    <div class="row mt-4">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="/auto/list?prev" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php for ($i = 1; $i <= $page; $i++) { ?>
                    <li class="page-item">
                        <a class="page-link"
                           href="/auto/list?page=<?= $i ?>"><?= $i ?>
                        </a>
                    </li>
                <?php } ?>
                <li class="page-item">
                    <a class="page-link" href="/auto/list?next" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>