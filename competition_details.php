<?php

session_start();
include 'components/links.php';
include 'db/connection.php';
if (strlen($_SESSION['LoginRole']) === 0) {

    header('location: admin/login.php');
}

$participatedOrNot = "SELECT user, competition FROM participants WHERE user = ".$_SESSION['ID']." AND competition = ".$_GET['id'];
$getPart = mysqli_query($connection, $participatedOrNot);
if( mysqli_num_rows($getPart) > 0 )
{
    ?>
        <script>
            window.location.href = 'competitions.php';
        </script>
    <?php
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

    $history = "SELECT * FROM competitions WHERE competition_id = ".$_GET['id']." ORDER BY competition_id DESC";
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
                                <h3 class="mb-0"><?php echo $row['competition_title'] ?> </h3>
                                <p>$<?php echo $row['prize'] ?></p>
                                <p><?php echo $row['competition_desc'] ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="mb-0 font-weight-bold">Start Date</p>
                                        <p class="mb-0 font-weight-bold">End Date</p>
                                    </div>
                                    <div>
                                        <p class="mb-0"><?php echo $row['competition_start_date'] ?></p>
                                        <p class="mb-0"><?php echo $row['competition_end_date'] ?></p>
                                    </div>
                                </div>
                                <button onclick="participate(<?php echo $_SESSION['ID'] ?>)" class="d-block mx-auto button button--nanuk button--text-thick button--text-upper button--size-s button--border-thick btn mt-4">
                                    <span>P</span><span>a</span><span>r</span><span>t</span><span>i</span><span>c</span><span>i</span><span>p</span><span>a</span><span>t</span><span>e</span>
                                </button>
                                <script>
                                    function participate( id )
                                    {

                                        window.location.href = 'participate.php?id=' + id + '&topic=<?php echo $row['competition_topic'] ?>';

                                    }
                                </script>
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