<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - E-Project</title>

    <!-- Index.css File -->
    <link rel="stylesheet" type="text/css" href="css/index.css" />

    <!-- Fonts.css File -->
    <link rel="stylesheet" type="text/css" href="css/fonts.css" />
    <!-- slider file -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />


    <?php
    include 'components/links.php';
    include 'db/connection.php';
    ?>

</head>

<body>

    <!-- TopBar section start from here which holds some basic functionalities -->
    <?php include '_topBar.php' ?>
    <!-- TopBar section end -->

    <!-- Navbar start from here -->
    <?php include '_navbar.php' ?>
    <!-- Navbar end here -->

    <!-- Main slider Start From Here -->
    <div class="swiper-container mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="slider">
                    <div class="slider_content d-flex justify-content-center align-items-center">
                        <div class="left_side d-flex justify-content-left align-items-center">
                            <div>
                                <h6 class="font-weight-bold mb-0">THE BOOKWORMS EDITORS</h6>
                                <h1>
                                    Featured Book of the <br />
                                    <b>
                                        <script>
                                            const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                                            const date = new Date();
                                            document.write(monthNames[date.getMonth()]);
                                        </script>
                                    </b>
                                </h1>


                                <button class="button button--nanuk button--text-thick button--text-upper button--size-s button--border-thick btn mt-3">
                                    <span>S</span><span>e</span><span>e</span> <span>m</span><span>o</span><span>r</span><span>e</span>
                                </button>

                            </div>
                        </div>
                        <div class="right_side">
                            <img src="images/pngtree-purple-novel-coronavirus-pneumonia-prevention-and-control-leaflet-png-image_5564246.png" width="100%" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slider">
                    <div class="slider_content d-flex justify-content-center align-items-center">
                        <div class="left_side d-flex justify-content-left align-items-center">
                            <div>
                                <h6 class="font-weight-bold mb-0">THE BOOKWORMS EDITORS</h6>
                                <h1>
                                    Best selling book of <br />
                                    <b>
                                        <script>
                                            var d = new Date();
                                            var n = d.getFullYear();
                                            document.write(n);
                                        </script>
                                    </b>
                                </h1>


                                <button class="button button--nanuk button--text-thick button--text-upper button--size-s button--border-thick btn mt-3">
                                    <span>S</span><span>e</span><span>e</span> <span>m</span><span>o</span><span>r</span><span>e</span>
                                </button>

                            </div>
                        </div>
                        <div class="right_side">
                            <img src="images/9781409181637-640x996.jpg" width="100%" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slider">
                    <div class="slider_content d-flex justify-content-center align-items-center">
                        <div class="left_side d-flex justify-content-left align-items-center">
                            <div>
                                <h6 class="font-weight-bold mb-0">THE BOOKWORMS EDITORS</h6>
                                <h1>
                                    Featured Books of the <br />
                                    <b>
                                        <script>
                                            const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                                            const date = new Date();
                                            document.write(monthNames[date.getMonth()]);
                                        </script>
                                    </b>
                                </h1>


                                <button class="button button--nanuk button--text-thick button--text-upper button--size-s button--border-thick btn mt-3">
                                    <span>S</span><span>e</span><span>e</span> <span>m</span><span>o</span><span>r</span><span>e</span>
                                </button>

                            </div>
                        </div>
                        <div class="right_side">
                            <img src="images/pngtree-purple-novel-coronavirus-pneumonia-prevention-and-control-leaflet-png-image_5564246.png" width="100%" />
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="swiper-pagination"></div>
    </div>

    <!-- Main slider End Here -->

    <!-- Categories section start from here -->
    <div class="featured_categories">
        <div class="d-flex justify-content-between align-items-center">
            <h2> <b>Fetaured Categories</b> </h2>
            <a href="allCategories.php">
                <h6 class="d-flex align-items-center justify-content-center"><span>All Categories</span><i class="categories_icons las la-angle-right"></i></h6>
            </a>
        </div>

        <div class="container-fluid mt-4 px-0">
            <div class="row">
                <?php
                $getCategories = "SELECT * FROM categories GROUP BY id DESC LIMIT 4";
                $gotCategories = mysqli_query($connection, $getCategories);
                while ($category = mysqli_fetch_assoc($gotCategories)) {
                ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                        <div class="divs">
                            <div>
                                <img src="images/categories/<?php echo $category['category_image'] ?>" width="50" class="mb-4" />
                                <h5><?php echo $category['category'] ?></h5>
                                <a href="categorizedProducts.php?category=<?php echo $category['category'] ?>" class="text-secondary">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Categories section end here -->

    <!-- Best Selling books Section Start Here -->
    <div class="bestSellingBook">
        <div class="d-flex justify-content-between align-items-center">
            <h2> <b>Best Selling Books</b> </h2>
            <a href="section_books.php?section=1">
                <h6 class="d-flex align-items-center justify-content-center"><span>View All</span><i class="categories_icons las la-angle-right"></i></h6>
            </a>
        </div>

        <?php
        $q = "SELECT posts.*, users.user_first_name, users.user_last_name from posts LEFT OUTER JOIN users ON posts.post_auther = users.user_id WHERE posts.post_section = 1 GROUP BY posts.post_id DESC LIMIT 4";
        $res = mysqli_query($connection, $q);
        ?>
        <div class="container-fluid px-0 mt-4">
            <div class="row">
                <?php
                while ($row = mysqli_fetch_assoc($res)) {
                ?>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="divs" onclick="postDetails(<?php echo $row['post_id'] ?>)">
                            <div class="px-5 py-3">
                                <img src="images/posts/<?php echo $row['post_image']; ?>" width="100%" height="250" />
                            </div>
                            <hr>
                            <div>
                                <p class="mb-0" style="color:orange;"><?php echo substr($row['post_date'], 0, 10) ?></p>
                                <p class="text-justify" style="word-wrap: break-word;">
                                    <?php if (strlen($row['post_desc']) > 55) {
                                        echo substr($row['post_desc'], 0, 52) . ' ...';
                                    } else {
                                        echo $row['post_desc'];
                                    } ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center mb-0 pb-0">
                                    <p class="text-secondary mb-0 pb-0"><?php echo $row['user_first_name'] . ' ' . $row['user_last_name'] ?></p>
                                    <p class="mb-0 pb-0">$<?php echo $row['post_price'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        function postDetails(id) {
                            window.location.href = 'postDetails.php?id=' + id;
                        }
                    </script>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Best Selling books Section End Here -->

    <!-- New Release books Section Start Here -->
    <div class="NewRelease">
        <div class="d-flex justify-content-between align-items-center">
            <h2>New Releases</h2>
            <a href="##">
                <h6 class="d-flex align-items-center justify-content-center"><span>View All</span><i class="categories_icons las la-angle-right"></i></h6>
            </a>
        </div>

        <div class="container-fluid px-0 mt-4">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="offerRelease">
                        <img src="images/new-released.png" width="100%" />
                        <div>
                            <h1>Get Extra</h1>
                            <h1 class="font-weight-bold" style="color: #F75454;">Sale - 25%</h1>
                            <h2 class="text-uppercase" style="color: #BEB4B4;">
                                on order over $100
                            </h2>
                            <button class="btn">View More</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">History</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Science</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">News</a>
                            <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Social</a>
                        </div>
                    </nav>
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="divs">
                                        <div class="px-3 py-3">
                                            <img src="images/img1.jpg" width="100%" height="192" />
                                        </div>
                                        <div>
                                            <p class="mb-0" style="color: #f9ad45;">3rd Edition</p>
                                            <p class="text-justify">
                                                Here is some desscription for a particular item book
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center mb-0 pb-0">
                                                <p class="text-secondary mb-0 pb-0">Auther Name</p>
                                                <p class="mb-0 pb-0">$29</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="divs">
                                        <div class="px-3 py-3">
                                            <img src="images/img10.jpg" width="100%" height="192" />
                                        </div>
                                        <div>
                                            <p class="mb-0" style="color: #f9ad45;">3rd Edition</p>
                                            <p class="text-justify">
                                                Here is some desscription for a particular item book
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center mb-0 pb-0">
                                                <p class="text-secondary mb-0 pb-0">Auther Name</p>
                                                <p class="mb-0 pb-0">$29</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="divs">
                                        <div class="px-3 py-3">
                                            <img src="images/img5 (1).jpg" width="100%" height="192" />
                                        </div>
                                        <div>
                                            <p class="mb-0" style="color: #f9ad45;">3rd Edition</p>
                                            <p class="text-justify">
                                                Here is some desscription for a particular item book
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center mb-0 pb-0">
                                                <p class="text-secondary mb-0 pb-0">Auther Name</p>
                                                <p class="mb-0 pb-0">$29</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="divs">
                                        <div class="px-3 py-3">
                                            <img src="images/img1.jpg" width="100%" height="192" />
                                        </div>
                                        <div>
                                            <p class="mb-0" style="color: #f9ad45;">3rd Edition</p>
                                            <p class="text-justify">
                                                Here is some desscription for a particular item book
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center mb-0 pb-0">
                                                <p class="text-secondary mb-0 pb-0">Auther Name</p>
                                                <p class="mb-0 pb-0">$29</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="divs">
                                        <div class="px-3 py-3">
                                            <img src="images/img10.jpg" width="100%" height="192" />
                                        </div>
                                        <div>
                                            <p class="mb-0" style="color: #f9ad45;">3rd Edition</p>
                                            <p class="text-justify">
                                                Here is some desscription for a particular item book
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center mb-0 pb-0">
                                                <p class="text-secondary mb-0 pb-0">Auther Name</p>
                                                <p class="mb-0 pb-0">$29</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="divs">
                                        <div class="px-3 py-3">
                                            <img src="images/img5 (1).jpg" width="100%" height="192" />
                                        </div>
                                        <div>
                                            <p class="mb-0" style="color: #f9ad45;">3rd Edition</p>
                                            <p class="text-justify">
                                                Here is some desscription for a particular item book
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center mb-0 pb-0">
                                                <p class="text-secondary mb-0 pb-0">Auther Name</p>
                                                <p class="mb-0 pb-0">$29</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="divs">
                                        <div class="px-3 py-3">
                                            <img src="images/img1.jpg" width="100%" height="192" />
                                        </div>
                                        <div>
                                            <p class="mb-0" style="color: #f9ad45;">3rd Edition</p>
                                            <p class="text-justify">
                                                Here is some desscription for a particular item book
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center mb-0 pb-0">
                                                <p class="text-secondary mb-0 pb-0">Auther Name</p>
                                                <p class="mb-0 pb-0">$29</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="divs">
                                        <div class="px-3 py-3">
                                            <img src="images/img10.jpg" width="100%" height="192" />
                                        </div>
                                        <div>
                                            <p class="mb-0" style="color: #f9ad45;">3rd Edition</p>
                                            <p class="text-justify">
                                                Here is some desscription for a particular item book
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center mb-0 pb-0">
                                                <p class="text-secondary mb-0 pb-0">Auther Name</p>
                                                <p class="mb-0 pb-0">$29</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="divs">
                                        <div class="px-3 py-3">
                                            <img src="images/img5 (1).jpg" width="100%" height="192" />
                                        </div>
                                        <div>
                                            <p class="mb-0" style="color: #f9ad45;">3rd Edition</p>
                                            <p class="text-justify">
                                                Here is some desscription for a particular item book
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center mb-0 pb-0">
                                                <p class="text-secondary mb-0 pb-0">Auther Name</p>
                                                <p class="mb-0 pb-0">$29</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="divs">
                                        <div class="px-3 py-3">
                                            <img src="images/img1.jpg" width="100%" height="192" />
                                        </div>
                                        <div>
                                            <p class="mb-0" style="color: #f9ad45;">3rd Edition</p>
                                            <p class="text-justify">
                                                Here is some desscription for a particular item book
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center mb-0 pb-0">
                                                <p class="text-secondary mb-0 pb-0">Auther Name</p>
                                                <p class="mb-0 pb-0">$29</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="divs">
                                        <div class="px-3 py-3">
                                            <img src="images/img10.jpg" width="100%" height="192" />
                                        </div>
                                        <div>
                                            <p class="mb-0" style="color: #f9ad45;">3rd Edition</p>
                                            <p class="text-justify">
                                                Here is some desscription for a particular item book
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center mb-0 pb-0">
                                                <p class="text-secondary mb-0 pb-0">Auther Name</p>
                                                <p class="mb-0 pb-0">$29</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="divs">
                                        <div class="px-3 py-3">
                                            <img src="images/img5 (1).jpg" width="100%" height="192" />
                                        </div>
                                        <div>
                                            <p class="mb-0" style="color: #f9ad45;">3rd Edition</p>
                                            <p class="text-justify">
                                                Here is some desscription for a particular item book
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center mb-0 pb-0">
                                                <p class="text-secondary mb-0 pb-0">Auther Name</p>
                                                <p class="mb-0 pb-0">$29</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-center"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- New Release books Section End Here -->


    <!-- slider script -->
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- swiper script -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,

            },
            autoplay: {
                delay: 4500,
                disableOnInteraction: false,
            },
        });
    </script>
    <!-- swiper script end -->
</body>

</html>