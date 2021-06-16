<?php

session_start();
if( strlen( $_SESSION['LoginRole'] ) === 0 ) {

    header('location: admin/login.php');
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
    include 'components/links.php';
    include 'db/connection.php';
    $getnessaryInfo = "SELECT users.user_first_name, users.user_last_name FROM users WHERE user_id = " . $_SESSION['ID'];
    $StartProcess = mysqli_query($connection, $getnessaryInfo);
    $info = mysqli_fetch_assoc($StartProcess);
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
            <div class="w-75 p-5 bg-white">
                <form action="" method="POST">
                    <h2 class="mb-4">Payment Information</h2>
                    <div class="d-flex justify-content-center mb-3 px-0 mx-0">
                        <input type="text" class="form-control m-0 mr-1 rounded-pill" placeholder="First Name" value="<?php echo $info['user_first_name'] ?>" name="usrfname" />
                        <input type="text" class="form-control m-0 ml-1 rounded-pill" placeholder="Last Name" value="<?php echo $info['user_last_name'] ?>" name="usrlname" />
                    </div>
                    <input type="text" class="form-control rounded-pill mb-3" placeholder="Address" name="usraddress" />
                    <input type="email" class="form-control rounded-pill mb-3" placeholder="Email" name="usremail" />
                    <div class="d-flex justify-content-center mb-3 px-0 mx-0">
                        <select class="form-control m-0 mr-1 rounded-pill" placeholder="Payment Method" name="usrpaymethod">
                            <option value="">Payment Method</option>
                            <option value="CreditCard">Credit Card</option>
                            <option value="DD">DD</option>
                            <option value="Cheque">Cheque</option>
                            <option value="VP">VP</option>
                        </select>
                        <input type="text" class="form-control m-0 ml-1 rounded-pill" placeholder="Phone Number" name="usrphone" />
                    </div>
                    <div class="text-center left_side w-100">
                        <!-- <button class="btn mt-3" type="submit" name="pay">Pay</button> -->
                        <button type="submit" name="pay" class="button button--nanuk button--text-thick button--text-upper button--size-s button--border-thick btn mt-3">
                                    <span>P</span><span>a</span><span>y</span>
                                </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    if ( isset( $_POST['pay'] ) )
    {
        $UsrAddress = $_POST['usraddress'];
        $UsrEmail = $_POST['usremail'];
        $UsrPayMethod = $_POST['usrpaymethod'];
        $UsrPhone = $_POST['usrphone'];

        $now = new DateTime();
        $timestring = $now->format('Y-m-d h:i:s');
        
        $PriceSum = "SELECT SUM(price) AS Total FROM cart LEFT OUTER JOIN posts ON cart.post_id = posts.post_id LEFT OUTER JOIN users ON cart.user_id = users.user_id WHERE users.user_id = ".$_SESSION['ID']." AND cart.status != 'sold'";
        $getTotal = mysqli_query($connection, $PriceSum);
        $total = mysqli_fetch_assoc($getTotal);

        $PayQuery = "INSERT INTO payments (user_id, total_amount, payment_date, user_address, user_email, user_phone, payment_method) VALUES (".$_SESSION['ID'].", '".$total['Total']."', '$timestring', '$UsrAddress', '$UsrEmail', '$UsrPhone', '$UsrPayMethod')";
        $Pay = mysqli_query($connection, $PayQuery);

        $getPayID = "SELECT payment_id AS PayID FROM payments WHERE user_id = " . $_SESSION['ID'] . " ORDER BY payment_id DESC LIMIT 1";
        $ID = mysqli_query($connection, $getPayID);
        $PayID = mysqli_fetch_assoc($ID);

        $ChangeStatus = "UPDATE cart SET status = 'sold', payment_id = " . $PayID['PayID'] . "  WHERE user_id = " . $_SESSION['ID'];
        $startQuery = mysqli_query($connection, $ChangeStatus);

        $Delivery = "INSERT INTO deliveries (payment_id, delivery_status) VALUES (" . $PayID['PayID'] . ", 'delivered')";
        $Pay = mysqli_query($connection, $Delivery);

        $Rqst = "INSERT INTO requests (user, payment_id, request_title, request_desc, request_status) VALUES(" . $_SESSION['ID'] . ", ".$PayID['PayID'].", '".$_SESSION['LoginID']." want to buy some items with ID ".$PayID['PayID']."', '".$_SESSION['LoginID']." has sent $".$total['Total']." by $UsrPayMethod.', 'Waiting')";
        $StartRqst = mysqli_query($connection, $Rqst);

        ?>
            <script>
                window.location.href = 'payment_success.php';
            </script>
        <?php

    }
    ?>
    <!-- Main slider End Here -->
</body>

</html>