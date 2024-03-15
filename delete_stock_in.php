<?php
include("connection.php");
include("sessions.php");

$stock_in_id=$_GET['stock_in_id'];

$delete=$con->query("DELETE FROM `stock_in` WHERE `stock_in_id`='$stock_in_id'");

if($delete){
    header("Location:stock_in.php");
}
else{
    echo
    "
        <script>
            alert('Failed to delete stock in product...');
        </script>
    ";
}
?>