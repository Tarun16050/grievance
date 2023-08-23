<?php
    include("database.php");  
    $x = $_POST["id"];
    $status_update_query = "UPDATE `grievance_table` SET `Status`='Reject' WHERE `id`=$x";
    $status_update_query_run = mysqli_query($con, $status_update_query);
    if ($status_update_query_run) { echo "Update successful"; } else { echo "Update failed";}
    mysqli_close($con);
?>
