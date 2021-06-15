<?php

session_start();
if( strlen( $_SESSION['LoginRole'] ) === 0 || $_SESSION['LoginRole'] === 'User' ) {

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
        <div class="category-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    <div><h1><b>ALL CATEGORY</b></h1></div>
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
                            $search = "SELECT categories.* FROM categories WHERE categories.category LIKE '" . $Skeyword . "%'";

                            $res = mysqli_query($connection, $search);
                            while ($row = mysqli_fetch_array($res)) {
                                ?>
                                    <div class="divs mb-3 p-5" style="background-color: #FAF1FF;">
                                        <div>
                                            <img src="../images/categories/<?php echo $row['category_image'] ?>" width="50" class="mb-4" />
                                            <h5><?php echo $row['category'] ?></h5>
                                            <a href="##" class="text-secondary">View Details</a>
                                        </div>
                                    </div>
                                <?php
                                }
                        }else
                        {
                            $search = "SELECT categories.* FROM categories";

                            $res = mysqli_query($connection, $search);
                            while ($row = mysqli_fetch_array($res)) {
                                ?>
                                    <div class="divs mb-3 p-5" style="background-color: #FAF1FF;">
                                        <div>
                                            <img src="../images/categories/<?php echo $row['category_image'] ?>" width="50" class="mb-4" />
                                            <h5><?php echo $row['category'] ?></h5>
                                            <a href="##" class="text-secondary">View Details</a>
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