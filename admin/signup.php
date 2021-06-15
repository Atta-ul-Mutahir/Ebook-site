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

    ?>
</head>

<?php

    if ( isset( $_POST['signup'] ) )
    {

        $FirstName = mysqli_real_escape_string( $connection, $_POST['FirstName']);
        $LastName = mysqli_real_escape_string( $connection, $_POST['LastName']);
        $SiteName = mysqli_real_escape_string( $connection, $_POST['UserName']);
        $Pass = mysqli_real_escape_string( $connection, md5($_POST['Pass']));
        $ConfirmPass = mysqli_real_escape_string( $connection, $_POST['CnfPass']);

        $Check = "SELECT * FROM users WHERE user_name = '$SiteName'";
        $UserExist = mysqli_query( $connection, $Check );

        if ( mysqli_num_rows( $UserExist ) > 0 )
        {

            ?>
                <script>
                    alert("User already exist");
                </script>
            <?php

        }else
        {
            $query = "INSERT INTO users(user_first_name, user_last_name, user_name, user_password, user_role) VALUES ('$FirstName', '$LastName', '$SiteName', '$Pass', 'User')";
            $MySQL = mysqli_query( $connection, $query ) or die( 'Query failed' );

            if( $MySQL )
            {
                $query = "SELECT * FROM users WHERE user_name = '$SiteName' AND user_password = '$Pass'";
                $MySQL = mysqli_query($connection, $query) or die('Query failed');
                $res = mysqli_fetch_assoc($MySQL);
                
                $_SESSION['LoginID'] = $res['user_name'];
                $_SESSION['LoginRole'] = $res['user_role'];
                $_SESSION['ID'] = $res['user_id'];
                header('location: index.php');
            }else
            {
                ?>
                    <script>
                        alert('Error');
                    </script>
                <?php
            }
        }

    }

?>

<body>
    <div class="AuthPage">
        <div class="AuthForm">
            <form action="" method="POST">
                <h2 class="mb-3">Signup</h2>
                <input type="text" class="form-control mb-3" placeholder="Your First Name" minlength="3" maxlength="10" name="FirstName" pattern="[a-zA-Z]+" title="First Name only contains letters" required />
                <input type="text" class="form-control mb-3" placeholder="Your Last Name" minlength="3" maxlength="10" name="LastName" pattern="[a-zA-Z]+" title="Last Name only contains letters" required />
                <input type="text" class="form-control mb-3" placeholder="Site User Name" minlength="3" maxlength="15" name="UserName" pattern="[a-zA-Z0-9]+" title="User Name should contains letters and numeric digits" required />
                <!-- <select name="" class="form-control mb-3">
                    <option value="">Select The Role</option>
                    <option value="Admin">Admin</option>
                    <option value="Auther">Auther</option>
                </select> -->
                <input type="password" class="form-control mb-3" placeholder="Your Password" minlength="3" maxlength="15" name="Pass" pattern="[a-zA-Z0-9]+" title="Password must contains uppercase, lowercase and numbers" />
                <input type="password" class="form-control mb-3" placeholder="Confirm Password" minlength="3" maxlength="15" name="CnfPass" pattern="[a-zA-Z0-9]+" title="Password must contains uppercase, lowercase and numbers" />
                <div class="text-center">
                    <button class="btn mb-3" name="signup" type="submit">Signup</button>
                    <p class="mb-0">Already have an account? <a href="/admin/login.php" class="text-light font-weight-bold">Login</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>