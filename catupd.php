<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('config.php');
$cat_id = $_GET['Cid'];
$getid = "SELECT * from `category` where Cid ='$cat_id'";
$result = mysqli_query($connection, $getid);
if (!$result) {
    die("Query Failed");
}
if (mysqli_num_rows($result) > 0) {
    while ($rows = mysqli_fetch_assoc($result)) {
        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="CSS/Updateuser.css">
            <title>Update User Details</title>
        </head>

        <body>
            <div class="container">
            <div class="col-md-6 zain">
                <form action="Updatecat.php" method="post" class="form-group ">
                    <h1>Update User Details</h1>
                    <div>
                        <input type="hidden" name="Cid" class="form-control" value="<?php echo $rows['Cid'] ?>">
                        <label for="c_name"> Cat_Name </label>
                        <input type="text" name="Cname" class="form-control" value="<?php echo $rows['Cname'] ?>">
                    </div>

                    <div>
                        <label for="c_type">Cat_Type </label>
                        <input type="text" name="Ctype" class="form-control" value="<?php echo $rows['Ctype'] ?>">
                    </div>
                    <div>
                        <label for="c_des">Cat_Description </label>
                        <input type="text" name="Cdes" class="form-control" value="<?php echo $rows['Cdes'] ?>">
                    </div>
            </div>
            <div class="modal-footer">
                <!-- <button href="addcat.php" type="submit" class="btn btn-danger">Close</button> -->
                <button type="submit" name="addcat" class="btn btn-success">Update </button>
            </div>
            </form>
            </div>
    </div>
            <?php
    }
}

?>
</body>

</html>
<?php
include('admin/includes/footer.php');
?>