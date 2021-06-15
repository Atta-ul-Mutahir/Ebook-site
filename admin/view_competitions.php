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

<?php

$query = "SELECT posts.*, users.user_first_name, users.user_last_name from posts LEFT OUTER JOIN users ON posts.post_auther = users.user_id WHERE users.user_name = '" . $_SESSION['LoginID'] . "'";
$res = mysqli_query($connection, $query);


?>

<body class="admin">

    <!-- Top Bar Section Start Here -->
    <?php include '_topbar.php' ?>
    <!-- Top Bar Section End Here -->

    <!-- Navbar Section Start Here -->
    <?php include '_navbar.php' ?>
    <!-- Navbar Section End Here -->

    <!-- main Div where all content are present -->
    <div class="main-content">
        <div class="category-content">  <div><h3> <b>Previous Competetions</b> </h3></div>
            <div class="container-fluid">
              
                <br />
                <div class="row">
                    <div class="col-12">
                        <form action="" method="POST">
                            <div class="col-12 btn-group mb-3 px-0">
                                <input type="search" name="search" class="form-control rounded-0 border-right-0" placeholder="Search Here" />
                                <button class="btn rounded-0 border" name="startSearch"><i class="las la-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 post_section py-5">
                        <?php
                        if (isset($_POST['startSearch'])) {
                            $Skeyword = $_POST['search'];
                            $search = "SELECT competitions.* FROM competitions WHERE competitions.competition_title LIKE '" . $Skeyword . "%'";

                            $res = mysqli_query($connection, $search);
                            while ($row = mysqli_fetch_array($res)) {
                        ?>
                                <div class="row py-5 mb-4 pt-3 shadow viewcom">
                                    <div class="col-8 align-items-left">
                                        <p class="mb-2">''<?php echo $row['competition_title'] ?>''</p>
                                        
                                    </div>
                                    <div class="col-4 align-items-right mt-2">
                                    <p class="mb-2">$<?php echo $row['prize'] ?></p>
                                       <small class="font-weight-bold d-block">Start-Date    <span><small><?php echo $row['competition_start_date'] ?></small></span></small>
                                       <small class="font-weight-bold d-block">End-Date      <span><small><?php echo $row['competition_end_date'] ?></small></span></small>
                                    </div>
                                </div>
                            <?php
                            }
                        } else {
                            $search = "SELECT competitions.* FROM competitions";

                            $res = mysqli_query($connection, $search);
                            while ($row = mysqli_fetch_array($res)) {
                            ?>
                                <div class="row py-5 mb-4 pt-3 shadow viewcom">
                                    <div class="col-8 align-items-left">
                                        <p class="mb-2">''<?php echo $row['competition_title'] ?>''</p>
                                       
                                    </div>
                                    <div class="col-4 align-items-right mt-2 "> 
                                    <p class="mb-2">$<?php echo $row['prize'] ?></p>
                                       <small class="font-weight-bold d-block">Start-Date    <span><small><?php echo $row['competition_start_date'] ?></small></span></small>
                                       <small class="font-weight-bold d-block">End-Date      <span><small><?php echo $row['competition_end_date'] ?></small></span></small>
                                    </div>
                                </div>
                        <?php
                            }
                        }


                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Div is end here -->

</body>

</html>