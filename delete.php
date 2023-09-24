<?php
include('config.php');
$cat_id = $_GET['Cid'];

$delete = "DELETE from `category` where Cid = '$cat_id'";

$result = mysqli_query($connection, $delete);

if (!$delete) {
    die("Query Failed");
}
header('location:viewcat.php');
?>