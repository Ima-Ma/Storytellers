<?php
    include("connection.php");
    include("header.php");
?>
<div class="main-panel">
<div class="content-wrapper">
<h1 class="text-success display-2 fw-bold my-3"><strong>Users List:</strong> </h1>

    <table class="table">
        <tr class="bg-dark text-white">
            <th>Id</th>
            <th>Username</th>
            <th>Email</th>
            <th>Delete</th>
        </tr>
        <?php
            $sql = "SELECT * FROM user_login";
            $result = mysqli_query($conn, $sql);
            while ($rows = mysqli_fetch_assoc($result)) {
        ?>             
        <tr>
        <td><?php echo $rows['id']; ?></td>
                                    <td><?php echo $rows['username']; ?></td>
                                    <td><?php echo $rows['user_email']; ?></td>
                                    <td>
                                        <a href="users_delete.php?id=<?php echo $rows['id']; ?>" class="mx-5 text-success">
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