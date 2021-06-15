<div class="row">

<?php

include '../db/connection.php';
$query = "SELECT * FROM requests";
$res = mysqli_query($connection, $query);

while ($data = mysqli_fetch_assoc($res)) {

?>
    <div class="col messages mb-2">
        <div class="d-flex justify-content-between">
            <small class="pr-4"><b><?php echo $data['request_title'] ?></b></small>
            <small><b><?php echo $data['request_status'] ?></b></small>
        </div>
        <small style="word-wrap: break-word;" class="d-block my-3"><?php echo $data['request_desc'] ?></small>
        <form action="rqstHandler.php?id=<?php echo $data['id'] ?>&user=<?php echo $data['user'] ?>&payment=<?php echo $data['payment_id'] ?>" method="POST">
            <div class="btn-group w-100">
                <button class="btn btn-acpt" name="Accept">Accept</button>
                <button class="btn btn-danger" name="Decline">Decline</button>
            </div>
        </form>
    </div>
<?php

}

?></div>