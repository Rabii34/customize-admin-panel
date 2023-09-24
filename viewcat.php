<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('config.php');
$query="SELECT * from `category` where Cstatus='1'";
$res=mysqli_query($connection,$query);
if($res){
    if(mysqli_num_rows($res)>0){
    

     
  
?>


    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <h2>All Categories </h2>
                <hr>
            <table class="table table-warning">
                <thead class="bg-warning p-2 text-dark bg-opacity-10" style="opacity: 75%;">
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Cat_Name</th>
                    <th scope="col">Cat_Type</th>
                    <th scope="col">Cat_Des</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
             
                <tbody>
                <?php
                while($row=mysqli_fetch_assoc($res)){
                    ?>
                    <tr>
                    <th scope="row"><?php echo $row['Cid']?></th>
                    <td><?php echo $row['Cname']?></td>
                    <td><?php echo $row['Ctype']?></td>
                    <td><?php echo $row['Cdes']?></td>
                    <td ><a href="catupd.php?id=<?php echo $row['Cid']; ?>" class="btn btn-success">Update</a></td>
                    <td ><a href="trash.php?id=<?php echo $row['Cid']; ?>" class="btn btn-danger">Trash</a></td>
                    
                </tr>
                <?php
                   }
                ?>
                
                </tbody>
               
            </table>
            <?php
                  }
                }
                ?>
            <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
            </nav>

            </div>

        </div>

    </div>


</body>

</html>










<?php
include('admin/includes/footer.php');


?>