<?php
include "header.php";
include "config.php";

if (isset($_POST['save'])) {
    $category_name = mysqli_real_escape_string($conn, $_POST['cat']); // Corrected the input field name

    // You should use a prepared statement to insert data securely.
    $sql = "INSERT INTO category (category_name, post) VALUES ('$category_name', 0)"; // Assuming 'post' is an integer field
    if (mysqli_query($conn, $sql)) {
        header("Location: {$hostname}/admin/category.php"); // Assuming you want to redirect to the category list
        exit(); // Make sure to exit after the header redirection
    }
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add New Category</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form Start -->
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                    </div>
                    <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                </form>
                <!-- /Form End -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
