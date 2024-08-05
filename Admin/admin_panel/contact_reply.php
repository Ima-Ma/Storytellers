<?php
include("header.php");
include("connection.php");

$ID = $_GET["id"];
$sql = "SELECT * FROM contact WHERE id = $ID";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($result);
?>
<div class="main-panel">
<div class="content-wrapper">
    <h1 class="text-success display-2 fw-bold my-3"><strong>Response:</strong> </h1>
    
                                <form method="POST">
                                    <div class="row">
                                            <label for="" class="text-success">User Name:
                                            </label>
                                            <input type="text" name="user_name" class="form-control" value="<?php echo htmlspecialchars($rows['full_name']); ?>">
                                            <label for=""class="text-success">User Email:
                                            </label>
                                            <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($rows['email']); ?>">
                                        <label for="" class="text-success">User Message:
                                        </label>
                                        <input type="text" name="user_message" class="form-control" value="<?php echo htmlspecialchars($rows['message']); ?>">
                                        <label for="" class="text-success">Message:
                                        </label>
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Your Message"></textarea>
                                    <br>
                                    <button type="submit" name="send" class="btn btn-success mt-3">Send Message!</button>
                                </form>
</div>
</div>
<?php
include("footer.php");
?>

<!-- Email work -->
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if (isset($_POST['send'])) {
    $email = $_POST['email'];
    $message = $_POST['message'];
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
        $mail->Subject = 'In Response to Your Inquiry!';
        $mail->Body    = htmlspecialchars($message);
        $mail->send();
        echo "<script>
            window.location.href='contact.php';
        </script>";
    } catch (Exception $e) {
        echo "";
    }
}
?>
