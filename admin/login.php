<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin</title>
    <!-- Admin.css File -->
    <link rel="stylesheet" type="text/css" href="../css/admin.css" />

    <!-- Fonts.css File -->
    <link rel="stylesheet" type="text/css" href="../css/fonts.css" />

    <?php

        include '../components/links.php' ;
        include '../db/connection.php';
        session_start();

    ?>
</head>

<?php

    if ( isset( $_POST['login'] ) )
    {

        $SiteName = mysqli_real_escape_string( $connection, $_POST['SiteName']);
        $Pass = mysqli_real_escape_string( $connection, md5($_POST['Pass']));

        $query = "SELECT * FROM users WHERE user_name = '$SiteName' AND user_password = '$Pass'";
        $MySQL = mysqli_query( $connection, $query ) or die( 'Query failed' );
        $res = mysqli_fetch_assoc( $MySQL );

        if( mysqli_num_rows( $MySQL ) > 0 )
        {
            $_SESSION['LoginID'] = $res['user_name'];
            $_SESSION['LoginRole'] = $res['user_role'];
            $_SESSION['ID'] = $res['user_id'];
            if ( $_SESSION['LoginRole'] === "User" )
            {
                header('location: ../index.php');
            }else
            {
                header('location: index.php');
            }
        }else
        {
            ?>
                <script>
                    alert('Error');
                </script>
            <?php
        }

    }

?>

<body>
    <div class="AuthPage">
        
        <div class="AuthForm">
           <h1 align="center">Admin panel</h1>
           <hr color="white" width="60%"><hr color="white" width="45%"><br/>
            <form action="" method="POST">
                <h2 class="mb-3">E-Book Login</h2>
                <input type="text" class="form-control mb-3" placeholder="Your Site Name" name="SiteName" />
                <input type="password" class="form-control mb-3" placeholder="Your Password" name="Pass" />
                <div class="text-center">
                    <button class="btn mb-3" name="login" type="submit">Login</button>
                    <p class="mb-0">Don't have an account? <a href="/admin/signup.php" class="text-light font-weight-bold">Signup</a></p>
                    <p class="mb-0">Go <a href="/index.php" class="text-light font-weight-bold">Home</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>