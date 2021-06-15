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
						<span>S</span><span>e</span><span>e</span> <span></span> <span>m</span><span>o</span><span>r</span><span>e</span>
					</button>
                </div>
            </div>
            <div class="right_side">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14488.738008966135!2d67.04454043596348!3d24.789135008777162!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33d0da8778751%3A0xf466063d4c2a9f35!2sClifton%20Beach%2C%20Karachi!5e0!3m2!1sen!2s!4v1623063322624!5m2!1sen!2s" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
    <!-- Main slider End Here -->
</body>
</html>