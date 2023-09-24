<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('config.php');
if(isset($_POST['submit'])){
    $pname = $_POST['pname'];
    $pcat = $_POST['pcat'];
    $pdesc = $_POST['pdesc'];
    $price = $_POST['price'];
    $pimage = $_FILES['pimage']['name'];
    $pimage_tmp = $_FILES['pimage']['tmp_name'];
    $pimage_size = $_FILES['pimage']['size'];
   


    $check_product = "SELECT * from `products` where pname = '$pname'";
    $result = mysqli_query($connection, $check_product);
    if (mysqli_num_rows($result) > 0) {
        echo "<script> alert('Product already exist'); </script>";
    } else {
        $insert_pro = "INSERT INTO `products` (`pname`, `pcat`, `pdesc`, `price`, `image`) VALUES ('$pname', '$pcat', '$pdesc', '$price', '$pimage')
        ";
        $connection_insert = mysqli_query($connection, $insert_pro);
        move_uploaded_file($pimage_tmp, 'pictures/' . $pimage);
        if($connection_insert){
            echo "<script> alert('Product added successfully'); </script>";

        }
       
    }


}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/customstyle.css">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block form-reg-bg"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Add Product</h1>
                            </div>
                            <form class="user" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data" >
                            <div>
              <input type="hidden" name="pid" class="form-control">
            </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Pro Name" name="pname">
                                    </div>
                                   
                                </div>
                                <div class="col-md-12">

                <?php
                $product = "SELECT * from category";
                $result1 = mysqli_query($connection, $product);
                if(mysqli_num_rows($result1) > 0) {

                
                ?>
                <select class="form-select" name="pcat" aria-label="Default select example">
                    <option selected>Select Category</option>
                    <?php
                    while($row = mysqli_fetch_assoc($result1)){
                    ?>
                    <option value="<?php echo $row['Cid']?>"><?php echo  $row['Cname']?></option>
                    <?php
                    }  
                    }                
                    ?>
                </select>
                </div>
                <br>
                
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Pro Cat" name="pcat">
                                    </div>
                </div>
                                    <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Pro Desc" name="pdesc">
                                    </div>
                </div>
                                    
                                    <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Price" name="price">
                                    </div>
                </div>
                                    
                <label for="image"> Image </label>
                <input type="file" name="pimage" class="form-control">
                                    </div>
                                    <div>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
                </div>
                                   
                                

                              
                                <!-- <a href="login.html" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </a> -->
                                
                                </div>
                                <!-- <a href="addcat.php" class="btn btn-success btn-user btn-block">
                                    <i class="submit" name="submit"></i> Submit
                                </a> -->
                                <!-- <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a> -->
                                
                            </form>
                            
                            
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
<?php
include('admin/includes/footer.php');
?>