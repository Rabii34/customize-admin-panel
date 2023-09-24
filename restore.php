<?php
include('config.php');
$cat_id = $_GET['Cid'];

$delete = "UPDATE `category` SET Cstatus = '1' where Cid = $cat_id";

$result = mysqli_query($connection, $delete);

if (!$delete) {
    die("Query Failed");
}
header('location:trashdata.php');
?>