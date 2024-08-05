<?php
    include("connection.php");
    include("header.php");
?>
<div class="main-panel">
<div class="content-wrapper">
<h1 class="text-success display-2 fw-bold my-3"><strong>Authors List:</strong> </h1>

    <table  class="table">
        <tr class="bg-dark text-white">
            <th>Id</th>
            <th>Author Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Gender</th>
            <th>Delete</th>
        </tr>
        <?php
            $sql = "SELECT * FROM authors_list where status = 1";
            $result = mysqli_query($conn, $sql);
            while ($rows = mysqli_fetch_assoc($result)) {
        ?>             
        <tr>
        <td><?php echo $rows['id']; ?></td>
                                    <td><?php echo $rows['name']; ?></td>
                                    <td><?php echo $rows['email']; ?></td>
                                    <td><?php echo $rows['password']; ?></td>
                                    <td><?php echo $rows['gender']; ?></td>
                                    <td>
                                        <a href="author_delete.php?id=<?php echo $rows['id']; ?>" class="mx-5 text-success">
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