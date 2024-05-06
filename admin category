<?php include "header.php"; ?>

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">Add Category</a>
            </div>
            <?php
            include("config.php");
            $limit = 3;
            
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $offset = ($page - 1) * $limit;
            $sql = "SELECT * FROM category LIMIT {$offset},{$limit}";
            $result = mysqli_query($conn, $sql) or die("Connection failed: " . mysqli_connect_errno());

            if (mysqli_num_rows($result) > 0) {
            ?>
                <div class="col-md-12">
                    <table class="content-table">
                        <thead>
                            <th>S.No.</th>
                            <th>Category Name</th>
                            <th>No. of Posts</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            <?php
                            $sno = $offset + 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $sno . "</td>";
                                echo "<td class='id'>" . $row['category_name'] . "</td>";
                                echo "<td>" . $row['post'] . "</td>";
                                echo "<td class='edit'><a href='update-category.php?id=" . $row['category_id'] . "'><i class='fa fa-edit'></i></a></td>";
                                echo "<td class='delete'><a href='delete-category.php?id=" . $row['category_id'] . "'><i class='fa fa-trash-o'></i></a></td>";
                                echo "</tr>";
                                $sno++;
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                    // Pagination
                    $sql1="SELECT * FROM category";
                    $result1=mysqli_query($conn,$sql1) or die("Query failed");
                    if(mysqli_num_rows($result1)){
                        $total_records=mysqli_num_rows($result1);
                        
                        $total_page= ceil($total_records/$limit);
                        echo " <ul class='pagination admin-pagination'>";
                        if($page>1){
                             echo '<li><a href="category.php?page='.($page-1).'">prev</a></li>';
                        }
    
                       
                        for($i=1; $i<=$total_page; $i++){
                            if($i==$page){
                                $active="active";
                            }else{
                                $active="";
                            }
                            echo "<li class='$active'><a href='category.php?page=$i'>$i</a></li>";
                        }
                        if($total_page>$page){
                            echo '<li><a href="category.php?page='.($page+1).'">next</a></li>';
                        }
                      echo "</ul> ";
    
                       }
                    ?>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
