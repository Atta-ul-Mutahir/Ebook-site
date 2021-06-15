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
    $getdeatils = "SELECT payments.*, deliveries.*, users.* FROM users LEFT OUTER JOIN payments ON users.user_id = payments.user_id LEFT OUTER JOIN deliveries ON payments.payment_id = deliveries.payment_id WHERE payments.payment_id = " . $_GET['id'];
    $start = mysqli_query($connection, $getdeatils);
    $details = mysqli_fetch_assoc($start);
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
            <div class="left_side w-75">
                <h1 class="text-center mb-5">$<?php echo $details['total_amount'] ?></h1>
                <div class=" d-flex justify-content-between align-items-center">
                    <div>
                        <b>User First Name</b>
                        <p><?php echo $details['user_first_name'] ?></p>
                        <b>User Email</b>
                        <p><?php echo $details['user_email'] ?></p>
                        <b>User Phone</b>
                        <p><?php echo $details['user_phone'] ?></p>
                    </div>
                    <div>
                        <b>User Last Name</b>
                        <p><?php echo $details['user_last_name'] ?></p>
                        <b>User Address</b>
                        <p><?php echo $details['user_address'] ?></p>
                        <b>Delivery Status</b>
                        <p><?php echo $details['delivery_status'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main slider End Here -->
</body>

</html>