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

// $query = "SELECT * FROM users WHERE user_id = ".$_GET['id']."";
// $res = mysqli_query($connection, $query);
// $data = mysqli_fetch_assoc( $res );


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
                        <form action="" method="POST">
                            <h3 class="mb-4"> <b>Add New Auther</b> </h3>
                           
                            <small>Auther First Name</small>
                            <input type="text" class="form-control rounded-0 mb-3" placeholder="Auther First Name" name="autherfname" />
                           
                            <small>Auther Last Name</small>
                            <input type="text" class="form-control rounded-0 mb-3" placeholder="Auther Last Name" name="autherlname" />
                           
                            <small>Auther Site Name</small>
                            <input type="text" class="form-control rounded-0 mb-3" placeholder="Auther Site Name" name="authername" />
                           
                            <small>Password</small>
                            <input type="password" class="form-control rounded-0 mb-3" placeholder="Password" name="autherpass" />
                           
                            <small>Role</small>
                            <select name="autherrole" class="form-control rounded-0 mb-3">
                                <option value="">Select Role</option>
                                <option value="Admin">Admin</option>
                                <option value="Auther">Auther</option>
                            </select>
                            <div class="text-center">
                                <button type="submit" class="btn border-dark stb" name="createauther">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if (isset($_POST['createauther'])) {
            $AutherFName = $_POST['autherfname'];
            $AutherLName = $_POST['autherlname'];
            $AutherName = $_POST['authername'];
            $AutherPass = sha1($_POST['autherpass']);
            $AutherRole = $_POST['autherrole'];

            $query = "INSERT INTO users(user_first_name, user_last_name, user_name, user_password, user_role) VALUES ('$AutherFName', '$AutherLName', '$AutherName', '$AutherPass', '$AutherRole')";
            $MySQL = mysqli_query($connection, $query) or die('Query failed');

            ?>
                <script>
                    window.location.href = 'view_authers.php';
                </script>
            <?php
        }
        ?>
    </div>
    <!-- Main Div is end here -->

</body>

</html>