<?php

session_start();
if (strlen($_SESSION['LoginRole']) === 0) {

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

    $history = "SELECT * FROM payments WHERE payments.user_id = " . $_SESSION['ID'] . " ORDER BY payment_id DESC";
    $q = mysqli_query($connection, $history);
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
                <div class="w-75 p-5 bg-white" style="max-height: 500px; overflow: auto;">
                    <?php
                        while ( $row = mysqli_fetch_assoc($q) )
                        {
                            ?>
                                <div class="py-3 px-5 history d-flex justify-content-between align-items-center" onclick="historyDetalis(<?php echo $row['payment_id'] ?>)">
                                    <div>
                                        <h3 class="mb-0">$<?php echo $row['total_amount'] ?> </h3>
                                    </div>
                                    <div>
                                        <div><small><?php echo $row['user_email'] ?></small></div>
                                        <div><small><?php echo $row['user_address'] ?></small></div>
                                        <div><b style="font-size: 10px;"><?php echo $row['payment_date'] ?></b></div>
                                    </div>
                                </div>
                            <?php
                        }
                    ?>
                    <script>
                        function historyDetalis( id )
                        {
                            window.location.href = 'history_details.php?id=' + id;
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
    <!-- Main slider End Here -->
</body>

</html>