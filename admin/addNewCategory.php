<?php

session_start();
error_reporting(0);
if( strlen( $_SESSION['LoginRole'] ) === 0 || $_SESSION['LoginRole'] === 'User' ) {

    header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Dashboard</title>
    <!-- Admin.css File -->
    <link rel="stylesheet" type="text/css" href="../css/admin.css" />

    <!-- Fonts.css File -->
    <link rel="stylesheet" type="text/css" href="../css/fonts.css" />

    <?php

    include '../components/links.php';
    include '../db/connection.php';

    ?>
</head>

<?php

$query = "SELECT * FROM users WHERE user_name = '" . $_SESSION['LoginID'] . "'";
$res = mysqli_fetch_assoc(mysqli_query($connection, $query));

?>

<body class="admin">

    <!-- Top Bar Section Start Here -->
    <?php include '_topbar.php' ?>
    <!-- Top Bar Section End Here -->

    <!-- Navbar Section Start Here -->
    <?php include '_navbar.php' ?>
    <!-- Navbar Section End Here -->

    <!-- main Div where all content are present -->
    <div class="main-content">
        <div class="category-content">
            <div class="container-fluid">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                       <div> <h1> <b>ADD CATEGORY</b> </h1></div>
                            <div class="image_preview mb-3" id="preview_container">
                                <img src="" width="100%" height="100%" class="previewImage" />
                                <p class="mb-0 previewText">Please Upload an image</p>
                            </div> 
                            <input name="image" type="file" class="form-control rounded-0 mb-3" id="imgUpload" />
                            <small>Category Name</small>
                            <input type="text" name="CategoryName" class="form-control rounded-0 mb-3" placeholder="Category Name" />
                            <small>Category Code</small>
                            <input type="number" name="Code" class="form-control rounded-0 mb-3" placeholder="Code" />
                           
                            <div class="text-center">
                                <button class="btn border border-dark stb" name="creatNewCategory" type="submit">Create</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    if ( isset( $_POST['creatNewCategory'] ) )
    {
    
        $CategoryName = $_POST['CategoryName'];
        $Code = $_POST['Code'];

        $ImageName = $_FILES['image']['name'];
        $ImageTempName = $_FILES['image']['tmp_name'];

        move_uploaded_file( $ImageTempName, '../images/categories/' . $ImageName );
        $insertPost = "INSERT INTO categories(category_image, category, code) VALUES ('$ImageName', '$CategoryName', $Code)";

        if ( mysqli_query( $connection, $insertPost ) )
        {
            ?>
                <script>
                    window.location.href = '/admin/view_product.php';
                </script>
            <?php
        }else
        {
            ?>
                <script>
                    alert('error');
                </script>
            <?php
        }
    
    }
    ?>
    <!-- Main Div is end here -->

    <script>
        const uploadimg = document.getElementById('imgUpload');
        const previewContainer = document.getElementById('preview_container');
        const previewImg = previewContainer.querySelector('.previewImage');
        const previewtxt = previewContainer.querySelector('.previewText');

        uploadimg.addEventListener('change', function() {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                previewtxt.style.display = 'none';
                previewImg.style.display = 'block';

                reader.addEventListener('load', function() {
                    console.log(this);
                    previewImg.setAttribute('src', this.result);
                });

                reader.readAsDataURL(file);
            }
        });
    </script>

</body>

</html>