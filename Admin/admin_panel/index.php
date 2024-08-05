<?php
    include("header.php");
    include("connection.php");
?>
<style>
    .custom-block-image-wrap img {
        height: 120px;
        width: 200px;
    }
</style>
<div class="main-panel">
          <div class="content-wrapper">
          <div class="container">
            <div class="row">
                <div class="col-lg-4 col-12  mb-4 mb-lg-0  ">
                    <div class="bg-success shadow d-flex align-items-center justify-content-center p-4 h-100">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-users text-success"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0 mx-3"> Authors Active</h5>
                            <h1 class="text-white mb-0 mx-3" data-toggle="counter-up"><?php 
                                $sql = "SELECT name FROM authors_list ORDER BY id";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_num_rows($result);
                                echo $row;
                                ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12  bg-dark mb-4 mb-lg-0 p-5">
                        <div class="custom-block d-flex">
                            <div class="custom-block-info">
                                <h2 class="mb-2">
                                    <a href="detail-page.html" class="text-success">
                                        About Storytellers
                                    </a>
                                </h2>

                                <p class="mb-0">Best Story Writing Services. Have a fantastic story idea that you cannot find time to write? Our professional  story writing services are the answer.</p>

                            </div>

                            <div class="d-flex flex-column ms-auto">
                                <a href="#" class="badge ms-auto">
                                    <i class="bi-heart"></i>
                                </a>

                                <a href="#" class="badge ms-auto">
                                    <i class="bi-bookmark"></i>
                                </a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
          <section class="topics-section section-padding pb-0 mt-5" id="section_3">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap ">
                            <h4 class="section-title text-success">Topics</h4>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                        <div class="custom-block custom-block-overlay">
                            <a href="detail-page.html" class="custom-block-image-wrap">
                                <img src="https://img.freepik.com/premium-photo/horror-movies-concept_173387-4175.jpg?w=360"
                                    class="custom-block-image img" alt="">
                            </a>

                            <div class="custom-block-info custom-block-overlay-info">
                                <h5 class="mb-1">
                                    <a class="text-success"  href="listing-page.html">
                                       Horror
                                    </a>
                                </h5>

                                <p class="badge mb-0 text-dark">5 Episodes</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                        <div class="custom-block custom-block-overlay">
                            <a href="detail-page.html" class="custom-block-image-wrap">
                                <img src="https://www.penguinrandomhouse.ca/sites/default/files/2024-06/litfic1mb.jpg"
                                    class="custom-block-image img" alt="">
                            </a>

                            <div class="custom-block-info custom-block-overlay-info">
                                <h5 class="mb-1">
                                    <a class="text-success" href="listing-page.html">
                                        Drama
                                    </a>
                                </h5>

                                <p class="badge mb-0 text-dark">2 Episodes</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                        <div class="custom-block custom-block-overlay">
                            <a href="detail-page.html" class="custom-block-image-wrap">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSYxF-MJHgxLEUGYMSGprn4rW0yUoDuIYP3vA&s"
                                    class="custom-block-image img" alt="">
                            </a>

                            <div class="custom-block-info custom-block-overlay-info">
                                <h5 class="mb-1">
                                    <a class="text-success" href="listing-page.html">
                                       Fiction
                                    </a>
                                </h5>

                                <p class="badge mb-0 text-dark">3 Episodes</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                        <div class="custom-block custom-block-overlay">
                            <a href="detail-page.html" class="custom-block-image-wrap">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTrCsZ1n5VQ14qNfNz515FIdgXVrVa-tiBclA&s"
                                    class="custom-block-image img" alt="">
                            </a>

                            <div class="custom-block-info custom-block-overlay-info">
                                <h5 class="mb-1">
                                    <a class="text-success" href="listing-page.html ">
                                        Fairy Tale
                                    </a>
                                </h5>

                                <p class="badge mb-0 text-dark">8 Episodes</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
       
          </div>
          <!-- content-wrapper ends -->
          </div>
          <!-- main-panel ends -->
           <?php
            include("footer.php");
           ?>
