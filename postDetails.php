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

    $getPostDetails = "SELECT posts.*, users.user_first_name, users.user_last_name, users.user_id FROM posts LEFT OUTER JOIN users ON posts.post_auther = users.user_id WHERE posts.post_id = " . $_GET['id'];
    $startQuery = mysqli_query($connection, $getPostDetails);

    ?>
</head>

<body>
    <!-- TopBar section start from here which holds some basic functionalities -->
    <?php include '_topBar.php' ?>
    <!-- TopBar section end -->

    <!-- Navbar start from here -->
    <?php include '_navbar.php' ?>
    <!-- Navbar end here -->
    <?php
    session_start();
    while ($res = mysqli_fetch_assoc($startQuery)) {
    ?>
        <!-- Main slider Start From Here -->
        <div class="slider">
            <div class="slider_content d-flex justify-content-center align-items-center">
                <div class="left_side d-flex justify-content-left align-items-center">
                    <div>
                        <h6 class="font-weight-bold mb-0"><?php echo $res['user_first_name'] . ' ' . $res['user_last_name'] ?></h6>
                        <h1>
                            <?php echo $res['post_title'] ?>
                        </h1>
                        <p style="word-wrap: break-word;" class="pr-5">
                            <?php echo $res['post_desc'] ?>
                        </p>
                        <?php
                        if( strlen( $_SESSION['LoginRole'] ) === 0 ) {

                            ?>
                                <a href="/admin/login.php">
                                <button class="button button--nanuk button--text-thick button--text-upper button--size-s button--border-thick btn mt-3">
                                    <span>A</span><span>d</span><span>d</span> <span>t</span><span>o</span> <span>C</span><span>a</span><span>r</span><span>t</span>
                                </button></a>
                            <?php
                        }else
                        {
                            ?>
                                <a href="/addtocart.php?id=<?php echo $res['post_id'] ?>&user=<?php echo $_SESSION['ID'] ?>&price=<?php echo $res['post_price'] ?>"><button class="button button--nanuk button--text-thick button--text-upper button--size-s button--border-thick btn mt-3">
                                    <span>A</span><span>d</span><span>d</span> <span>t</span><span>o</span> <span>C</span><span>a</span><span>r</span><span>t</span>
                                </button></a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="right_side">
                    <img src="images/posts/<?php echo $res['post_image'] ?>" width="100%" />
                </div>
            </div>
        </div>
        <!-- Main slider End Here -->
    <?php
    }
    ?>
</body>

</html>