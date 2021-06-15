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
      
        <div class="product-content"> 
            <div class="">
                  <h2 align="Center"> <b>ADDING BOOK</b> </h2>
            </div>
           <br />
            <div class="container-fluid">
                <form action="" method="POST" enctype="multipart/form-data">
                <h3>Book Details </h3>
                    <div class="row">
    
                        <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                            <div class="image_preview mb-3" id="preview_container">
                                <img src="" width="100%" height="100%" class="previewImage" />
                                <p class="mb-0 previewText">Please Upload an image</p>
                            </div>
                            <div>
                                <small>Book Title Image</small>
                            <input name="image" type="file" class="form-control rounded-0 mb-3" id="imgUpload" />
                            <small>Book PDF File</small>
                            <input name="pdf" type="file" class="form-control rounded-0" id="pdfUpload" /> 
                            </div>
                            <br />
                            <div class="d-flex justify-content-center mb-3">
                                
                                <input type="text" name="Title" class="form-control rounded-0 mr-1" placeholder="Title" />
                                <input type="text" name="Auther" class="form-control rounded-0 ml-1" placeholder="Auther" value="<?php echo $res['user_first_name'] . ' ' . $res['user_last_name'] ?>" readonly />
                            </div>
                            <textarea minlength="50" name="Desc" class="form-control rounded-0 mb-3" placeholder="Some Description" style="height: 70px;"></textarea>
                           
                        </div>
                        
                        <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                            <h5 class="mb-0 text-capitalize">Book Category</h5>
                            <hr>
                            <select name="productCategoryType" id="ProTypeCategory" class="form-control rounded-0 mb-3">
                                <option value="">Please Select The Book Category</option>
                                <option value="1">Book</option>
                                <option value="2">CD</option>
                                <option value="3">Hard Copy</option>
                            </select>
                            <div id="secondCategory"></div>
                            <div id="thirdCategory"></div>
                            <div id="forthCategory"></div>
                            <div id="btnDiv" class="w-100 text-center"></div>

                            <script>
                                const PTypeCategory = document.getElementById('ProTypeCategory');
                                PTypeCategory.addEventListener('change', function() {
                                    let content = "";

                                    if (this.value === '1') {
                                        content = "\
                                        <p class='mb-0 text-capitalize'>Section Category (Book)</p>\
                                        <select name='SectionCategory' id='SecTypeCategory' onchange='sectionSelected()' class='form-control rounded-0 mb-3'>\
                                        <option value=''>Please Select The Post Category</option>\
                                        <?php $options = "SELECT * FROM categorize_sections WHERE type = 1"; $mySQL = mysqli_query($connection, $options); while ($row = mysqli_fetch_array($mySQL)) { ?>\
                                        <option value='<?php echo $row['code'] ?>'><?php echo $row['sections'] ?></option>\
                                        <?php } ?>\
                                        </select>";
                                        $('#secondCategory').html(content);
                                    } else if (this.value === '2') {
                                        content = "\
                                        <p class='mb-0 text-capitalize'>Section Category  (CD)</p>\
                                        <select name='SectionCategory' id='SecTypeCategory' onchange='sectionSelected()' class='form-control rounded-0 mb-3'>\
                                        <option value=''>Please Select The Post Category</option>\
                                        <?php $options = "SELECT * FROM categorize_sections WHERE type = 2"; $mySQL = mysqli_query($connection, $options); while ($row = mysqli_fetch_array($mySQL)) { ?>\
                                        <option value='<?php echo $row['code'] ?>'><?php echo $row['sections'] ?></option>\
                                        <?php } ?>\
                                        </select>";
                                        $('#secondCategory').html(content);
                                    } else if (this.value === '3') {
                                        content = "\
                                        <p class='mb-0 text-capitalize'>Section Category  (Hard Copy)</p>\
                                        <select name='SectionCategory' id='SecTypeCategory' onchange='sectionSelected()' class='form-control rounded-0 mb-3'>\
                                        <option value=''>Please Select The Post Category</option>\
                                        <?php $options = "SELECT * FROM categorize_sections WHERE type = 3"; $mySQL = mysqli_query($connection, $options); while ($row = mysqli_fetch_array($mySQL)) { ?>\
                                        <option value='<?php echo $row['code'] ?>'><?php echo $row['sections'] ?></option>\
                                        <?php } ?>\
                                        </select>";
                                        $('#secondCategory').html(content);
                                    } else {
                                        $('#secondCategory').html('');
                                        $('#thirdCategory').html('');
                                        $('#btnDiv').html('');
                                        $('#forthCategory').html('');
                                    }

                                });

                                function sectionSelected() {
                                    const fillOrNot = document.getElementById('SecTypeCategory').value;
                                    if (fillOrNot.length > 0) {
                                        let category = "\
                                        <p class='mb-0 text-capitalize'>Category</p>\
                                        <select name='category' id='category' class='form-control rounded-0 mb-3' onchange='addPrice()'>\
                                        <option value=''>Please Select The Post Category</option>\
                                        <?php $options = "SELECT * FROM categories"; $mySQL = mysqli_query($connection, $options); while ($row = mysqli_fetch_array($mySQL)) { ?>\
                                        <option value='<?php echo $row['code'] ?>'><?php echo $row['category'] ?></option>\
                                        <?php } ?>\
                                        </select>";
                                        $('#thirdCategory').html(category);
                                    } else {
                                        $('#thirdCategory').html('');
                                        $('#forthCategory').html('');
                                    }
                                }

                                function addPrice() {
                                    const allValid = document.getElementById('category').value;
                                    if (allValid.length > 0) {
                                        let price = "\
                                        <p class='mb-0 text-capitalize'>Price</p>\
                                        <input type='number' onkeyup='displayBtn()' id='price' name='price' class='form-control rounded-0 mb-3' placeholder='Price' />"
                                        $('#forthCategory').html(price);
                                    } else {
                                        $('#btnDiv').html('');
                                    }
                                }

                                function displayBtn() {
                                    const allValid = document.getElementById('price').value;
                                    if (allValid.length > 0) {
                                        let btns = "<button type='submit' name='createnewproduct' class='btn d-block mx-auto border-dark stb' style='background-color: #F75454; color: #fff'>Upload</button>"
                                        $('#btnDiv').html(btns);
                                    } else {
                                        $('#btnDiv').html('');
                                    }
                                }
                            </script>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['createnewproduct'])) {

        $Title = $_POST['Title'];
        $Auther = $_POST['Auther'];
        $Desc = $_POST['Desc'];

        $ImageName = $_FILES['image']['name'];
        $ImageTempName = $_FILES['image']['tmp_name'];

        $pdfName = $_FILES['pdf']['name'];
        $pdfTempName = $_FILES['pdf']['tmp_name'];

        $PCT = $_POST['productCategoryType'];
        $SecCat = $_POST['SectionCategory'];
        $category = $_POST['category'];
        $price = $_POST['price'];

        $now = new DateTime();
        $timestring = $now->format('Y-m-d h:i:s');

        move_uploaded_file($ImageTempName, '../images/posts/' . $ImageName);
        move_uploaded_file($pdfTempName, '../files/' . $pdfName);
        $insertPost = "INSERT INTO posts(post_title, post_desc, post_image, post_auther, post_date, post_type, post_section, category, post_price, post_file) VALUES ('$Title', '$Desc', '$ImageName', '" . $_SESSION['ID'] . "', '$timestring', '$PCT', '$SecCat', '$category', '$price', '$pdfName' )";

        if (mysqli_query($connection, $insertPost)) {
    ?>
            <script>
                window.location.href = '/admin/view_product.php';
            </script>
        <?php
        } else {
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