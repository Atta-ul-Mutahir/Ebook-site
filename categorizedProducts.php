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

    $getAllCategories = "SELECT users.user_first_name, users.user_last_name, posts.* FROM posts LEFT OUTER JOIN users on posts.post_auther = users.user_id LEFT OUTER JOIN categories ON posts.category = categories.code WHERE categories.category LIKE '%".$_GET['category']."%'";
    $categories = mysqli_query($connection, $getAllCategories);
    ?>
</head>

<body>
    <div class="featured_categories">
        <div class="container-fluid">
            <div class="row">
                <?php
                while ($row = mysqli_fetch_array($categories)) {
                ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-5">
                        <div class="divs" style="background-color: #FAF1FF;">
                            <div>
                                <img src="images/posts/<?php echo $row['post_image'] ?>" width="50" class="mb-4" />
                                <h5><?php echo $row['category'] ?></h5>
                                <a href="categorizedProducts.php?category=<?php echo $row['category'] ?>" class="text-secondary">View All products</a>
                            </div>
                        </div>
                    </div>
                <?php
                }

                ?>
            </div>
        </div>
    </div>
</body>

</html>