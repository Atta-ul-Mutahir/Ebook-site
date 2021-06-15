<?php

session_start();
if( strlen( $_SESSION['LoginRole'] ) === 0 ) {

    header('location: admin/login.php');
}

?>
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

    $getCartItems = "SELECT posts.*, users.user_first_name, users.user_last_name, users.user_id, cart.* FROM cart LEFT OUTER JOIN posts ON cart.post_id = posts.post_id LEFT OUTER JOIN users ON cart.user_id = users.user_id WHERE users.user_id = " . $_SESSION['ID'] . " AND cart.status != 'sold'";
    $startQuery = mysqli_query($connection, $getCartItems);
    $rows = mysqli_num_rows($startQuery);

    $PriceSum = "SELECT SUM(price) AS Total FROM cart LEFT OUTER JOIN posts ON cart.post_id = posts.post_id LEFT OUTER JOIN users ON cart.user_id = users.user_id WHERE users.user_id = ".$_SESSION['ID']." AND cart.status != 'sold'";
    $getTotal = mysqli_query($connection, $PriceSum);
    $total = mysqli_fetch_assoc($getTotal);

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
                    <div style="max-height: 400px; overflow: auto;">
                        <?php
                        if ($rows > 0)
                        {
                            
                            while ($row = mysqli_fetch_assoc($startQuery)) {
                                ?>
                                    <div class="w-100 py-3 border-bottom border-top d-flex justify-content-start align-items-center">
                                        <div class="pr-4"><img src="images/posts/<?php echo $row['post_image'] ?>" width="60" height="80" /></div>
                                        <div class="w-100 pr-3">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="font-weight-bold mb-0"><?php echo $row['post_date'] ?></h6>
                                                <h6 class="font-weight-bold mb-0">$<?php echo $row['post_price'] ?> <a href="/deletecart.php?id=<?php echo $row['post_id'] ?>&user=<?php echo $row['user_id'] ?>"><i class="las la-trash"></i></a></h6>
                                            </div>
                                            <h3 class="mb-0">
                                                <?php echo $row['post_title'] ?>
                                            </h3>
                                            <p class="mb-0" style="word-wrap: break-word;">
                                                <?php echo $row['post_desc'] ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php
                            }
                        }else
                        {
                            ?>
                                <div class="d-flex justify-content-center">
                                    <h1 class="text-center">Cart is Empty</h1>
                                </div>
                            <?php
                        }
                        ?>
                    </div>
                    <p class="text-center"><b>Total:</b> $<?php echo $total['Total'] ?></p>
                    <?php

                    if ($rows > 0)
                    {
                        ?>
                         
                            <a href="payment.php" class="button button--nanuk button--text-thick button--text-upper button--size-s button--border-thick btn mt-3 d-block mx-auto">
                        <span>C</span><span>h</span><span>e</span><span>c</span><span>k</span><span>O</span><span>u</span><span>t</span>
                    </a>
                        <?php
                    }else
                    {
                        
                        ?>
                            
                            <a href="index.php" class="button button--nanuk button--text-thick button--text-upper button--size-s button--border-thick btn mt-3 d-block mx-auto">
                        <span>C</span><span>o</span><span>n</span><span>t</span><span>i</span><span>n</span><span>u</span><span>e</span> <span>s</span><span>h</span><span>o</span><span>p</span><span>p</span><span>i</span><span>n</span><span>g</span>
                    </a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Main slider End Here -->
</body>

</html>