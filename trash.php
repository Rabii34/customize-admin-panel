<?php

include('config.php');
$cat_id = $_GET['c_id'];

$delete = "UPDATE `add_cat` SET c_status = '0' where c_id = $cat_id";

$result = mysqli_query($connection, $delete);

if (!$delete) {
    die("Query Failed");
}
header('location:trashdata.php');
?>