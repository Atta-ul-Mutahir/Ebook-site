<?php

session_start();
if (strlen($_SESSION['LoginRole']) === 0 || $_SESSION['LoginRole'] === 'User') {

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
            <h3 class="mb-4 text-capitalize"> <b>ORGANIZE COMPETITION</b> </h3>
            <form action="" method="POST">
                <label for="competition title"> <small>Competition Title</small> </label>
                <input type="text" class="form-control rounded-0 mb-3" name="competitionTitle" placeholder="Competition Title" />
                <label for="competition topic"> <small>Topic</small> </label>
                <select name="competitionTopic" class="form-control rounded-0 mb-3">
                    <option value="">Competition Topic</option>
                    <option value="EssayWriting">Essay Writing</option>
                    <option value="StoryWriting">Story Writing</option>
                    <option value="JokeWriting">Joke Writing</option>
                </select>
                <div class="align-items-center mb-3">
                    <div class="w-35 pr-1">
                        <small>Start Date</small>
                        <input type="datetime-local" class="form-control rounded-0" name="competitionStartDate" />
                    </div>
                    <div class="w-35 pl-1">
                        <small>End Date</small>
                        <input type="datetime-local" class="form-control rounded-0" name="competitionEndDate" />
                    </div>
                </div>
                <label for="competition prize"> <small>Prize</small> </label>
                <input type="number" class="form-control rounded-0 mb-3" name="competitionPrize" placeholder="Competition Prize" />
                <label for="competition prize"> <small>Description</small> </label>
                <textarea name="desc" class="form-control tounded-0 mb-3" placeholder="Some Description" style="height: 100px"></textarea>
                <button type="submit" class="btn d-block mx-auto border-dark stb" name="organize">Organize</button>
            </form>
        </div>
    </div>
    <!-- Main Div is end here -->
    <?php
    if( isset( $_POST['organize'] ) )
    {
        $Title = $_POST['competitionTitle'];
        $Topic = $_POST['competitionTopic'];
        $StartDate = $_POST['competitionStartDate'];
        $EndDate = $_POST['competitionEndDate'];
        $Prize = $_POST['competitionPrize'];
        $Desc = $_POST['desc'];

        $organize = "INSERT INTO competitions (competition_title, competition_topic, competition_desc, competition_start_date, competition_end_date, prize, organizer) VALUES ('$Title', '$Topic', '$Desc', '$StartDate', '$EndDate', '$Prize', '".$_SESSION['ID']."')";
        $q = mysqli_query($connection, $organize);

    }
    ?>

</body>

</html>