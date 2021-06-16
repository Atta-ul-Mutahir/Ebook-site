<?php

session_start();
if (strlen($_SESSION['LoginRole']) === 0 || $_SESSION['LoginRole'] === 'User') {

    header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Dashboard</title>
    <!-- Admin.css File -->
    <link rel="stylesheet" type="text/css" href="../css/admin.css" />

    <!-- Fonts.css File -->
    <link rel="stylesheet" type="text/css" href="../css/fonts.css" />

    <?php

    include '../components/links.php';
    include '../db/connection.php';

    ?>
</head>

<body class="admin" onload="getMessages()">

    <!-- Top Bar Section Start Here -->
    <?php include '_topbar.php' ?>
    <!-- Top Bar Section End Here -->

    <!-- Navbar Section Start Here -->
    <?php include '_navbar.php' ?>
    <!-- Navbar Section End Here -->

    <!-- main Div where all content are present -->
    <div class="main-content">
        <div class="category-content" style="max-height: 800px !important;margin-top: 2% !important;">
        <h1> <b>Discussion Box</b> </h1><hr>
            <div class="msg_container pr-1" style="max-height: auto; overflow: auto;"></div>
            <form action="" method="POST">
                <div class="mt-3 btn-group w-100">
                    <textarea class="form-control" rows="1" placeholder="Type a Message" name="msg" ></textarea>
                    <button class="btn-success border mbw" type="submit" name="sendmsg"><i class="lar la-paper-plane"></i></button>
                </div>
            </form>
            <?php
            if (isset($_POST['sendmsg'])) {
                $now = new DateTime();
                $timestring = $now->format('Y-m-d h:i:s');
                $insert = "INSERT INTO messages (message_description, message_sender, message_date) VALUES ('" . $_POST['msg'] . "', 'Admin', '$timestring')";
                $Start = mysqli_query($connection, $insert);
            }
            ?>
        </div>
    </div>
    <script>
        function getMessages(val) {
            $.ajax({
                url: 'getmsgs.php',
                type: 'GET',

                success: function(res) {
                    $('.msg_container').html(res);
                }
            });
        }
    </script>
    <!-- Main Div is end here -->

</body>

</html>