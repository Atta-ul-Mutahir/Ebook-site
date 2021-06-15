<?php

    $baseURL = 'http://localhost:8080/PHP-Project';

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $database = 'php-eproject';

    $connection = mysqli_connect( $host, $user, $pass, $database ) or die("Connection failed : " . mysqli_connect_error());

?>