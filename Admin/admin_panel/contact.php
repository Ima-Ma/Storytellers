<?php
    include("connection.php");
    include("header.php");
?>
<div class="main-panel">
<div class="content-wrapper">
    <h1 class="text-success display-2 fw-bold my-3"><strong>Contact Forms Details:</strong> </h1>
    <table class="table">
        <tr class="bg-dark text-white">
            <th>Id</th>
            <th>User Fullname</th>
            <th>Email</th>
            <th>Message</th>
            <th>Reply</th>
            <th>Delete</th>
        </tr>
        <?php
            $sql = "SELECT * FROM contact";
            $result = mysqli_query($conn, $sql);
            while ($rows = mysqli_fetch_assoc($result)) {
        ?>             
        <tr>
        <td><?php echo $rows['id']; ?></td>
                                    <td><?php echo $rows['full_name']; ?></td>
                                    <td><?php echo $rows['email']; ?></td>
                                    <td><?php echo $rows['message']; ?></td>
                                    <td>
                                        <a href="contact_reply.php?id=<?php echo $rows['id']; ?>" class="mx-5 text-success">
                                            <i class="fa-solid fa-message"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="contact_delete.php?id=<?php echo $rows['id']; ?>" class="mx-5 text-success">
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