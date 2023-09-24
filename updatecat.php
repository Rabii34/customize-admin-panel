<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('config.php');

$cat_id = $_POST['Cid'];
$cat_name = $_POST['Cname'];
$cat_type = $_POST['Ctype'];
$cat_des = $_POST['Cdes'];

$update = "update `category` set Cname ='$cat_name' , Ctype = '$cat_type' , Cdes = '$cat_des' where Cid = '$cat_id' ";
$res = mysqli_query($connection, $update);
if (!$res) {
    die("Query failed");
}
// else{
// header('location:viewcat.php');
// }
?>