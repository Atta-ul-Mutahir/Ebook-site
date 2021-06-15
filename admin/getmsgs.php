<?php

include '../db/connection.php';
$query = "SELECT * FROM messages";
$res = mysqli_query($connection, $query);

while ($data = mysqli_fetch_assoc($res)) {

    if ( $data['message_sender'] === 'Admin' )
    {
        ?>
            <div class="messages mb-3 ml-auto">
                <div class="d-flex justify-content-between">
                    <small class="pr-4"><b><?php echo $data['message_sender'] ?></b></small>
                    <small><b><?php echo $data['message_date'] ?></b></small>
                </div>
                <small style="word-wrap: break-word;"><?php echo $data['message_description'] ?></small>
            </div>
        <?php
    }else
    {
        ?>
            <div class="messages mb-3">
                <div class="d-flex justify-content-between">
                    <small class="pr-4"><b><?php echo $data['message_sender'] ?></b></small>
                    <small><b><?php echo $data['message_date'] ?></b></small>
                </div>
                <small style="word-wrap: break-word;"><?php echo $data['message_description'] ?></small>
            </div>
        <?php
    }

}

?>