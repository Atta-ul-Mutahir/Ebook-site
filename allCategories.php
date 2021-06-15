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

    $getAllCategories = "SELECT * FROM categories";
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
                                <img src="images/categories/<?php echo $row['category_image'] ?>" width="50" class="mb-4" />
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