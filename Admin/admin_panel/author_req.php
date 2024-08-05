<?php
include("connection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

if (isset($_POST['send'])) {
    $email = $_POST['email'];
    $user_id = $_POST['user_id'];
    $code = random_int(10000, 99999);
    $_SESSION['confirm_code'] = $code;
    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'mushtaqueimama@gmail.com';
        $mail->Password   = 'llfegxrlynyzregx'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;
        $mail->setFrom('mushtaqueimama@gmail.com', 'The Storytellers');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Author Verification Code';
        $mail->Body    = "Your verification code is: $code";
        $mail->send();

        // Update the status in the database
        $updateSql = "UPDATE authors_list SET status = 1 WHERE id = ?";
        $stmt = $conn->prepare($updateSql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        echo "<script>
            window.location.href='author_req.php';
        </script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<?php
    include("connection.php");
    include("header.php");
?>
<div class="main-panel">
<div class="content-wrapper">
<h1 class="text-success display-2 fw-bold my-3"><strong>Authors Request:</strong> </h1>

    <table  class="table">
        <tr class="bg-dark text-white">
            <th>Id</th>
            <th>Author Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Gender</th>
            <th>Approve</th>
            <th>Delete</th>
        </tr>
        <?php
            $sql = "SELECT * FROM authors_list where status = 0";
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
                                        <i class="mx-5 fa-solid text-success fa-user-check accept" data-bs-toggle="modal" data-bs-target="#exampleModal" data-email="<?php echo $rows['email']; ?>" data-id="<?php echo $rows['id']; ?>"></i>
                                    </td>

                                    <td>
                                        <a href="author_delete.php?id=<?php echo $rows['id']; ?>" class="mx-5 text-success">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
        </tr>
        <?php } ?>
    </table>
    <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const icons = document.querySelectorAll('.accept');
        const nameInput = document.getElementById('name');
        const userIdInput = document.getElementById('user_id');

        icons.forEach(icon => {
            icon.addEventListener('click', function() {
                const clickedId = this.getAttribute('data-id');
                const email = this.getAttribute('data-email');

                nameInput.value = email;
                userIdInput.value = clickedId;
            });
        });
    });
</script>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Modal Work Start -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fw-bold text-success" id="exampleModalLabel">Send Verification Code!</h3>
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form method="POST">
                        <input type="hidden" name="user_id" id="user_id">
                        <div class="form-grp">
                            <label class="text-success" for="name">Email:</label>
                            <input type="text" class="form-control" name="email" id="name">
                        </div>
                        <button type="submit" name="send" class="btn mt-3 btn-success fw-bold">Send Approval Code!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Work End -->

<?php
    include("footer.php");
?>