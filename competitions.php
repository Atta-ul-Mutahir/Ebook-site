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
    session_start();
    include 'components/links.php';
    include 'db/connection.php';

    $history = "SELECT * FROM competitions ORDER BY competition_id DESC";
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
               
                <div class="w-75 p-5 bg-white" style="max-height: 500px; overflow: auto; opacity: 0.9; border-radius: 10px;">
                 <h2 class="mb-5"> <b>Competitions</b> </h2>
                    <?php
                        while ( $row = mysqli_fetch_assoc($q) )
                        {
                            ?>
                                <div class="py-3 px-5 history category-content" onclick="historyDetalis(<?php echo $row['competition_id'] ?>)">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0"><?php echo $row['competition_title'] ?> </h5>
                                        <div>
                                            <p class="mb-0"><small>$<?php echo $row['prize'] ?></small> </p>
                                            <p class="mb-0"><small><?php echo $row['competition_topic'] ?></small> </p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <div>
                                            <p class="font-weight-bold mb-0">Start date</p>
                                            <p class="mb-0"><?php echo $row['competition_start_date'] ?> </p>
                                        </div>
                                        <div>
                                            <p class="font-weight-bold mb-0">End date</p>
                                            <p class="mb-0"><?php echo $row['competition_end_date'] ?> </p>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                    ?>
                    <script>
                        function historyDetalis( id )
                        {
                            window.location.href = 'competition_details.php?id=' + id;
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
    <!-- Main slider End Here -->
</body>

</html>