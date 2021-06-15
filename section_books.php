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
include 'components/settings.php';
?>
</head>
<?php

$query = "SELECT users.user_first_name, users.user_last_name, posts.* FROM posts LEFT OUTER JOIN users ON posts.post_auther = users.user_id WHERE posts.post_section LIKE '%".$_GET['section']."%'";
$res = mysqli_fetch_assoc(mysqli_query($connection, $query));

?>
<body>
    
</body>
</html>