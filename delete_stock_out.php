<?php
include("connection.php");
include("sessions.php");

$stock_out_id=$_GET['stock_out_id'];

$delete=$con->query("DELETE FROM `stock_out` WHERE `stock_out_id`='$stock_out_id'");

if($delete){
    header("Location:stock_out.php");
}
else{
    echo
    "
        <script>
            alert('Failed to delete stock out product...');
        </script>
    ";
}
?>