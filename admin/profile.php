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

$query = "SELECT * FROM users WHERE user_id = ".$_GET['id']."";
$res = mysqli_query($connection, $query);
$data = mysqli_fetch_assoc( $res );


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
            <h1 align="center"> <b>PROFILE</b> </h1><hr width="200" size="10" color="black"><hr width="150" size="10" color="black"><hr width="100" size="10" color="black">
                <div class="row">
                
                
                    <div class="col-12" >
                        <br /><br />
                        <div class="d-flex justify-content-between mb-3 text-center">
                            <div class="w-50">
                                <h5 class="mb-0 font-weight-bold">First Name</h5><br />
                                <h6 class="mb-0"><?php echo $data['user_first_name'] ?></h6><hr>
                            </div>
                            <div class="w-50">
                                <h5 class="mb-0 font-weight-bold">Last Name</h5><br />
                                <h6 class="mb-0"><?php echo $data['user_last_name'] ?></h6><hr>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mb-3 text-center">
                            <div class="w-50">
                                <h5 class="mb-0 font-weight-bold">Site Name</h5><br />
                                <h6 class="mb-0"><?php echo $data['user_name'] ?></h6><hr>
                            </div>
                            <div class="w-50">
                                <h5 class="mb-0 font-weight-bold">User Role</h5><br />
                                <h6 class="mb-0"><?php echo $data['user_role'] ?></h6><hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Div is end here -->

</body>

</html>