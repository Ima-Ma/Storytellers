<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <?php
    include("connection.php");
    include("header.php");

    if (isset($_POST['submit'])) {
        $fullname = mysqli_real_escape_string($conn, $_POST['full_name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        // Basic server-side validation
        if (empty($fullname) || empty($email) || empty($message)) {
            echo "<script>
                    swal('Oops!', 'Please fill out all required fields.', 'error');
                    </script>";
        } else {
            $sql = "INSERT INTO contact(full_name, email, message) VALUES ('$fullname', '$email', '$message')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<script>
                        swal('Thank You!', 'Your message has been submitted successfully.', 'success')
                        .then((value) => {
                            window.location.href = window.location.href; // Refresh page
                        });
                        </script>";
            } else {
                echo "<script>
                        swal('Oops!', 'Something went wrong. Please try again later.', 'error');
                        </script>";
            }
        }
    }
    ?>

    <script>
    function validateForm() {
        var fullname = document.forms["contactForm"]["full-name"].value;
        var email = document.forms["contactForm"]["email"].value;
        var message = document.forms["contactForm"]["message"].value;

        if (fullname == "" || email == "" || message == "") {
            swal('Oops!', 'Please fill out all required fields.', 'error');
            return false;
        }
        return true;
    }
    </script>

    <main class="app-content">
        <header class="site-header d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center">
                        <h2 class="mb-0">Contact Page</h2>
                    </div>
                </div>
            </div>
        </header>

        <section class="section-padding" id="section_2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-12 pe-lg-5">
                        <div class="contact-info">
                            <h3 class="mb-4">We love to help you. Get in touch</h3>
                            <p class="d-flex border-bottom pb-3 mb-4">
                                <strong class="d-inline me-4">Phone:</strong>
                                <span>03112033680</span>
                            </p>
                            <p class="d-flex border-bottom pb-3 mb-4">
                                <strong class="d-inline me-4">Email:</strong>
                                <a href="mailto:imama@gmail.com">imama@gmail.com</a>
                            </p>
                            <p class="d-flex">
                                <strong class="d-inline me-4">Location:</strong>
                                <span>North Nazimabad, Karachi, Pakistan</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-5 col-12 mt-5 mt-lg-0">
                        <iframe class="google-map"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.819917806043!2d103.84793601429608!3d1.281807962148459!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da190c2c94ccb3%3A0x11213560829baa05!2sTwitter!5e0!3m2!1sen!2smy!4v1669212183861!5m2!1sen!2smy"
                            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>

        <section class="contact-section section-padding pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12 mx-auto">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">You know, Contact Form</h4>
                        </div>
                        <form action="" method="post" class="custom-form contact-form" onsubmit="return validateForm()" name="contactForm">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-floating">
                                        <input type="text" name="full_name" id="full_name" class="form-control"
                                            placeholder="Full Name" required="">
                                        <label for="full-name">Full Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-floating">
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="Email address" required="">
                                        <label for="email">Email address</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" id="message" name="message"
                                            placeholder="Describe message here" required=""></textarea>
                                        <label for="message">Describe message here</label>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12 ms-auto">
                                    <button type="submit" name="submit" class="bg-success form-control">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php
    include("footer.php");
    ?>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
