<?php

session_start();
if (strlen($_SESSION['LoginRole']) === 0) {

    header('location: admin/login.php');
}

?>
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

    $history = "SELECT * FROM competitions WHERE competition_id = " . $_GET['id'] . " ORDER BY competition_id DESC";
    $q = mysqli_query($connection, $history);
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
                <div class="w-100 p-5 bg-white" id="main">
                    <form action="" method="POST">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="text-capitalize mb-4">Start typing your <?php if ( $_GET['topic'] == 'EssayWriting' ) { echo "Essay"; }else if ($_GET['topic'] == 'StoryWriting'){ echo "Story"; }else { echo "Joke"; } ?></h4>

                            <!-- Display the countdown timer in an element -->
                            <h4 class="text-capitalize mb-4" id="demo"></h4>
                        </div>
                        <textarea minlength="100" rows="20" title="minimum 100 characters required" class="writing form-control mb-3" placeholder="Please Start Typing Here" name="pera"></textarea>
                        <!-- <button type="submit" name="essaySubmit" class="btn d-block mx-auto">Submit</button> -->
                        <button type="submit" name="essaySubmit" class="d-block mx-auto button button--nanuk button--text-thick button--text-upper button--size-s button--border-thick btn mt-4">
                                    <span>S</span><span>u</span><span>b</span><span>m</span><span>i</span><span>t</span>
                                </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Main slider End Here -->
    <?php

        if ( isset( $_POST['essaySubmit'] ) )
        {
            $written = $_POST['pera'];
            $q = "INSERT INTO textuals (txt) VALUES ('$written')";
            $save = mysqli_query($connection, $q);

            $id = "SELECT id AS id FROM textuals WHERE txt = '$written'";
            $getID = mysqli_query($connection, $id);
            $peraID = mysqli_fetch_assoc($getID);

            $participant = "INSERT INTO participants(user, status, txt) VALUES (".$_SESSION['ID'].", 'Participate', ".$peraID['id'].")";
            $startQ = mysqli_query($connection, $participant);
            ?>
                <script>
                    window.location.href = 'index.php';
                </script>
            <?php
        }

    ?>

    <script>
        // Time calculations for days, hours, minutes and seconds
        var minutes = 60;
        var seconds = 60;
        let hours = 2;
        // Set the date we're counting down to
        var countDownDate = null;

        // Update the count down every 1 second
        var forSeconds = setInterval(function() {

            if (seconds > 0) {
                seconds = seconds - 1;
            } else {
                seconds = 60;
            }
            // Display the result in the element with id="demo"
            document.getElementById("demo").innerHTML = 2 + "h " + minutes + "m " + seconds + "s ";

        }, 1000);

        // Update the count down every 1 minute
        var forMinutes = setInterval(function() {

            minutes = minutes - 1;
            // Display the result in the element with id="demo"
            document.getElementById("demo").innerHTML = 2 + "h " + minutes + "m " + seconds + "s ";

        }, 1000 * 60);

        // Update the count down every 1 hour
        var forHour = setInterval(function() {

            hours = hours - 1;
            // Display the result in the element with id="demo"
            document.getElementById("demo").innerHTML = hours + "h " + minutes + "m " + seconds + "s ";

        }, 1000 * 60 * 60);

        var end = setInterval(function() {

            if (hours === 0 && minutes === 0 && seconds === 0) {
                $('#main').html("<h1 class='text-center'>You are failed</h1> <a href='/competitions.php'><button class='btn d-block mx-auto'>Try Again</button></a>");
            }

        }, 1000);
    </script>
</body>

</html>