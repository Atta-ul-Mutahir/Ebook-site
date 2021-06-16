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
            <div class="left_side d-flex justify-content-center align-items-center">
                <div class="contacts">
                    <form action="" method="POST">
                        <h1 class="mb-3">
                            Contact Us
                        </h1>
                        <input type="text" class="form-control rounded-pill  mb-3" placeholder="Your Name" name="senderName" />
                        <textarea class="form-control mb-3 " name="msg" placeholder="Your Message" style="height: 100px;"></textarea>
                        <button class="button button--nanuk button--text-thick button--text-upper button--size-s button--border-thick btn mt-3" type="submit" name="contact">
						<span>S</span><span>u</span><span>b</span><span>m</span><span>i</span><span>t</span>
					</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Main slider End Here -->
    <?php
        if( isset( $_POST['contact'] ) )
        {
            $sender = $_POST['senderName'];
            $mssage = strval($_POST['msg']);

            $now = new DateTime();
            $timestring = $now->format('Y-m-d h:i:s');
            $imsg = "INSERT INTO messages (message_description, message_sender, message_date) VALUES ('$mssage', '$sender', '$timestring')";
            $Mysql = mysqli_query($connection, $imsg);
            ?>
                <script>
                    window.location.href = 'index.php';
                </script>
            <?php
        }
    ?>
</body>

</html>