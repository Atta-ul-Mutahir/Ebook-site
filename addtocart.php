<?php
    include 'db/connection.php';
    session_start();
    if( strlen( $_SESSION['LoginRole'] ) === 0 ) {

        header('location: /admin/login.php');
    }else
    {
        $id = $_GET['id'];
        $user = $_GET['user'];
        $price = $_GET['price'];
    
        $check = "SELECT post_id FROM cart WHERE post_id = " . $id . " AND status != 'sold'";
        $existOrNot = mysqli_query($connection, $check);
        $row = mysqli_fetch_assoc($existOrNot);
        if( $row > 0 )
        {
            header('location: postDetails.php?id='.$id);
        }else
        {
            $saveToCart = "INSERT INTO cart (user_id, post_id, price, status) VALUES ($user, $id, $price, 'initialized')";
            $StartQuery = mysqli_query($connection, $saveToCart);
            header('location: postDetails.php?id='.$id);
        }
    }
?>