<div class="container-fluid">
    <div class="col mt-5">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
            <tr>
                <th scope="col">#id</th>
                <th scope="col">email</th>
                <th scope="col">ism</th>
                <th scope="col">familya</th>
                <th scope="col">role</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($list as $item) {
                echo "<tr>";
                echo "<td>" . $item->id . "</td>";
                echo "<td>" . $item->email . "</td>";
                echo "<td>" . $item->firstname . "</td>";
                echo "<td>" . $item->lastname . "</td>";
                echo "<td>" . $item->role . "</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>