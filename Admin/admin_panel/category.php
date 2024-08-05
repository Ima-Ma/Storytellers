<?php
    include("connection.php");
    include("header.php");
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<div class="main-panel">
    <div class="content-wrapper">
    <div class="row">
        <div class="col-lg-8">
    <h1 class="text-success display-2 fw-bold "><strong>Category List:</strong> </h1>

        </div>
        <div class="col-lg-4">
            <button class="btn btn-success p-3 w-100 my-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Category</button>

        </div>
    </div>

    <table  class="table">
        <tr class="bg-dark text-white">
            <th>Id</th>
            <th>Category Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>Delete</th>
        </tr>
        <?php
            $sql = "SELECT * FROM category_list";
            $result = mysqli_query($conn, $sql);
            while ($rows = mysqli_fetch_assoc($result)) {
        ?>             
        <tr>
            <td><?php echo $rows['id']; ?></td>
            <td><?php echo $rows['category_name']; ?></td>
            <td><?php echo $rows['description']; ?></td>
            <td><img src="image_category/<?php echo $rows['image']; ?>" alt="<?php echo $rows['category_name']; ?>" style="width:100px; height: 100px;;"></td>
            <td>
            <a href="category_delete.php?id=<?php echo $rows['id']; ?>" class="mx-5 text-success">
            <i class="fa-solid fa-trash"></i>
            </a>        
        </td>
        </tr>
        <?php } ?>
    </table>
</div>
</div>
<?php
    include("footer.php");
?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-success fw-bold" id="exampleModalLabel">Add Category</h3>
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-grp">
                            <label class="text-success" for="category_name">Category Name:</label>
                            <input type="text" id="category_name" name="category_name" class="form-control" placeholder="Enter Category Name!" required>
                        </div>
                        <div class="form-grp mt-3">
                            <label class="text-success" for="description">Description:</label>
                            <input type="text" id="description" name="description" class="form-control" placeholder="Enter Description!" required>
                        </div>
                        <div class="form-grp mt-3">
                            <label class="text-success" for="image">Image:</label>
                            <input type="file" id="image" name="image" class="form-control" required>
                        </div>
                        <br>
                        <button type="submit" name="submit" class="btn btn-success">
                            <i class="fa-solid fa-plus"></i>Add!
                        </button>
                    </form>
                </div>
                <?php
                if (isset($_POST['submit'])) {
                    $category_name = mysqli_real_escape_string($conn, $_POST['category_name']);
                    $description = mysqli_real_escape_string($conn, $_POST['description']);
                    $image = $_FILES['image']['name'];
                    $image_tmp = $_FILES['image']['tmp_name'];
                    $upload_directory = "image_category/";

                    if (!empty($image)) {
                        // Validate image file type and size here
                        if (move_uploaded_file($image_tmp, $upload_directory . $image)) {
                            $sql = "INSERT INTO category_list (category_name, description, image) VALUES ('$category_name', '$description', '$image')";
                            if (mysqli_query($conn, $sql)) {
                                echo "<script>
                                swal('Good job!', 'Category Added successfully!', 'success')
                                    .then(() => {
                                        window.location.href='category.php';
                                    });
                                    </script>";
                            } else {
                                echo "<script>
                                swal('Oops!', 'Error adding Category!', 'error');
                                    </script>";
                            }
                        } else {
                            echo "<script>
                            swal('Oops!', 'Error uploading image!', 'error');
                                </script>";
                        }
                    }
                }
                ?>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- MODAL WORK END -->
