<?php
    include 'db/connection.php';
    $id = $_GET['id'];
    $user = $_GET['user'];
    $deleteCart = "DELETE FROM cart WHERE post_id = $id AND user_id = $user";
    $startCart = mysqli_query($connection, $deleteCart);
    header('location: cart.php');
?>