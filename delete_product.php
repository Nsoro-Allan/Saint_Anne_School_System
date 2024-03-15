<?php
include("connection.php");
include("sessions.php");

$product_id=$_GET['product_id'];

$delete=$con->query("DELETE FROM `products` WHERE `product_id`='$product_id'");

if($delete){
    header("Location:products.php");
}
else{
    echo
    "
        <script>
            alert('Failed to delete product...');
        </script>
    ";
}
?>