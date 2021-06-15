<?php
include '../db/connection.php';

if (isset($_POST['Accept'])) {
    $q = "UPDATE requests SET request_status = 'Accepted' WHERE id = " . $_GET['id'];
    $mysql = mysqli_query($connection, $q);

    $mail = "SELECT user_email AS mail FROM payments WHERE user_id = " . $_GET['user'] . " AND payment_id = " . $_GET['payment'];
    $getMail = mysqli_query($connection, $mail);
    $email = mysqli_fetch_assoc($getMail);

    $to = $email['mail'];
    $subject = "Request Accepted";
    $message = "Your request has been accepted successfully. Please click the following link to get you soft copies <a href='##'>Link</a>";
    $from = 'usman.umer0335@gmail.com';
    $headers =  'MIME-Version: 1.0' . "\r\n";
    $headers .= 'From: Your name <usman.umer0335@gmail.com>' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

    // $headers = [
    //     "MIME-Version : 1.0",
    //     "Content-type : text/plain charest=utf-8",
    //     "From : $from",
    //     "Cc : johnson.softs111@gmail.com",
    // ];

    // $headers = implode("\r\n", $headers);

    if (mail($to, $subject, $message, $headers)) {
    ?>
        <script>
            window.location.href = 'requests.php';
        </script>
    <?php
    }
}

if (isset($_POST['Decline'])) {
    $q = "UPDATE requests SET request_status = 'Denied' WHERE id = " . $_GET['id'];
    $mysql = mysqli_query($connection, $q);

    $mail = "SELECT user_email AS mail FROM payments WHERE user_id = " . $_GET['user'] . " AND payment_id = " . $_GET['payment'];
    $getMail = mysqli_query($connection, $mail);
    $email = mysqli_fetch_assoc($getMail);

    $to = $email['mail'];
    $subject = "Request Decline";
    $message = "Your request not has been accepted successfully due tosome reasons like payment not received, etc. Please try again.";
    $from = 'usman.umer0335@gmail.com';
    $headers =  'MIME-Version: 1.0' . "\r\n";
    $headers .= 'From: Your name <usman.umer0335@gmail.com>' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

    // $headers = [
    //     "MIME-Version : 1.0",
    //     "Content-type : text/plain charest=utf-8",
    //     "From : $from",
    //     "Cc : johnson.softs111@gmail.com",
    // ];

    // $headers = implode("\r\n", $headers);

    if (mail($to, $subject, $message, $headers)) {
    ?>
        <script>
            window.location.href = 'requests.php';
        </script>
    <?php
    }
}

?>