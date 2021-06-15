<?php
    include '../db/connection.php';

    $saveToCart = "INSERT INTO cart (user_id, post_id) VALUES ($user, $id)";
    $StartQuery = mysqli_query($connection, $saveToCart);;
    header('location: postDetails.php?id='.$id);
?>