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

        <div class="product-content">

            <div class="row w-100 ml-2 justify-content-between">
                <h4 class="py-2 align-middle"> <strong>ALL POSTS</strong> </h4>
                <form action="" method="POST">
                    <div class="col-12 btn-group mb-lg-3 mb-md-3 mb-sm-0 px-0">
                        <input type="search" name="search" class="form-control border" placeholder="Search Here" required />
                        <button class="btn rounded-0 border" name="startSearch"><i class="las la-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 post_section py-5">

                        <?php
                        if (isset($_POST['startSearch'])) {
                            $Skeyword = $_POST['search'];
                            $search = "SELECT posts.*, users.user_first_name, users.user_last_name FROM posts LEFT OUTER JOIN users ON posts.post_auther = users.user_id WHERE posts.post_title LIKE '" . $Skeyword . "%' || posts.post_desc LIKE '%" . $Skeyword . "%' || posts.post_auther = '" . $Skeyword . "'";

                            $res = mysqli_query($connection, $search);
                        }
                        while ($row = mysqli_fetch_array($res)) {
                        ?>

                            <div class="row post w-100 mb-5" style="font-size: 12px;" id="posts">

                                <div class="actionBtns">
                                    <a href="/admin/view_product.php?id=<?php echo $row['post_id'] ?>"><button class="btn btn-sm"><i class="lar la-edit"></i></button></a>
                                    <a href="/admin/delete_post.php?id=<?php echo $row['post_id'] ?>"><button class="btn btn-sm"><i class="las la-trash-alt"></i></button></a>
                                </div>
                                <div class="col-2 px-1 d-flex justify-content-center align-items-center">
                                    <img id="post_img" src="../images/posts/<?php echo $row['post_image'] ?>" width="100%" />
                                </div>
                                <div class="col-10 d-flex justify-content-start align-items-center">
                                    <div class="w-100">
                                        <h5 class="post_title" id="title"><?php echo $row['post_title'] ?></h5>
                                        <div class="row p-0 m-0 w-100">
                                            <div class="col-6 p-0">
                                                <p class="mb-0 font-weight-bold post_auther" id="auther">
                                                    <?php echo $row['user_first_name'] . " " . $row['user_last_name'] ?>
                                                </p>
                                            </div>
                                            <div class="col-6 p-0 text-right">
                                                <p class="mb-0 font-weight-bold post_date" id="date">
                                                    <?php echo $row['post_date'] ?>
                                                </p>
                                            </div>
                                        </div>
                                        <p class="mb-0 text-justify post_desc" id="desc" style="word-wrap: break-word;">
                                            <?php echo $row['post_desc'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }

                        ?>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12" style="font-size: 12px;">
                        <h6> <strong>EDIT POST</strong> </h6>
                        <div class="edit_post">
                            <?php
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $getThatPost = "SELECT posts.*, users.user_first_name, users.user_last_name from posts LEFT OUTER JOIN users ON posts.post_auther = users.user_id WHERE posts.post_id = " . $id . "";
                                $singlePost = mysqli_query($connection, $getThatPost);
                                $Post = mysqli_fetch_assoc($singlePost);
                            ?>
                                <div class="mb-3 editImg" style="background-image: url('../images/posts/<?php echo $Post['post_image']; ?>'); background-size: 100% 100%;">
                                    <div class="cameraIcon">
                                        <i class="las la-camera la-2x"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control form-control-sm rounded-0 mb-2" placeholder="New Title" value="<?php echo $Post['post_title']; ?>" />
                                <input type="text" class="form-control form-control-sm rounded-0 mb-2" placeholder="New Description" value="<?php echo $Post['post_desc']; ?>" />
                                <br />
                                <button class="btn btn-sm btn-block border-dark rounded-1 stb" style="background-color: #F75454; color: #ffffff;width: 100%;">Update</button>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Div is end here -->

</body>

</html>