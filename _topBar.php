<?php
    error_reporting(0);
    session_start();
    include 'db/connection.php';
    $getCart = "SELECT COUNT(cart.id) AS id FROM cart LEFT OUTER JOIN users ON cart.user_id = users.user_id WHERE users.user_id = " . $_SESSION['ID'] . " AND cart.status != 'sold'";
    $StartCart = mysqli_query($connection, $getCart);
    if( $StartCart )
    {
        $count = mysqli_fetch_assoc($StartCart);
    }
?>

<div class="top_bar">
    <div class="left_side d-flex align-items-start">
        <a href="help.php" class="d-flex justify-content-center align-items-center mr-3"><i class="d-mobile-600-none lar la-question-circle"></i>   Can we help you?</a>
        <!-- <a href="##" class="d-flex justify-content-center align-items-center"><i class="las la-mobile"></i>+92 330 3744620</a> -->
    </div>
    <div class="right_side">
        <a href="history.php" class="px-1" title="View Previous Orders"><i class="las la-history"></i></a>
        <a href="cart.php" class="px-1 cartIcon" title="View Cart"><i class="las la-shopping-cart"></i> <sup class="count"><?php if ( strlen($count['id']) !== 0) { echo $count['id']; }else { echo 0; } ?></sup></a>
        <?php
        if (strlen($_SESSION['LoginRole']) === 0) {
        ?>
            <a href="/admin/login.php" class="px-1" title="Login"><i class="lar la-user"></i></a>
        <?php
        } else {
        ?>
            <a href="/admin/logout.php" class="px-1" title="Logout"><i class="las la-sign-out-alt"></i></a>
            <?php
            if ($_SESSION['LoginRole'] !== "User") {
            ?>
                <a href="/admin/index.php" class="px-1" title="Go to Admin Panel"><i class="las la-arrow-right"></i></a>
            <?php
            }
        }
        ?>
    </div>
</div>