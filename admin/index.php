<?php

    session_start();
    if( strlen( $_SESSION['LoginRole'] ) === 0 || $_SESSION['LoginRole'] === 'User' )
    {

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

    $query = "SELECT * FROM users WHERE user_name = '" . $_SESSION['LoginID'] . "'";
    $res = mysqli_fetch_assoc( mysqli_query( $connection, $query ) );

?>

<body class="admin">

    <!-- Top Bar Section Start Here -->
    <?php include '_topbar.php' ?>
    <!-- Top Bar Section End Here -->

    <!-- Navbar Section Start Here -->
    <?php include '_navbar.php' ?>
    <!-- Navbar Section End Here -->

    <?php include 'dashboard_home.php' ?>

</body>

</html>