<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Index.css File -->
    <link rel="stylesheet" type="text/css" href="css/index.css" />

    <!-- Fonts.css File -->
    <link rel="stylesheet" type="text/css" href="css/fonts.css" />

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
    <div class="slider">
        <div class="slider_content d-flex justify-content-center align-items-center">
            <div class="left_side d-flex justify-content-center align-items-center">
                <div>
                    <h1 class="mb-3">
                        About Us
                    </h1>
                    <h6 class="font-weight-bold mb-0">E-BOOK PUBLISHERS</h6>
                    <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>
                    <a href="contact.php" class="button button--nanuk button--text-thick button--text-upper button--size-s button--border-thick btn mt-3">
                        <span>C</span><span>o</span><span>n</span><span>t</span><span>a</span><span>c</span><span>t</span> <span>u</span><span>s</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Main slider End Here -->
</body>

</html>