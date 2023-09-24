<?php
    include('admin/includes/header.php');
    include('admin/includes/sidebar.php');
    include('admin/includes/topbar.php');
    include('config.php');
     $limit = 4;
     if(isset($_GET['pageno'])){
      $getpageno = $_GET['pageno'];
     }else{
       $getpageno = 1;
     }
     $offset = ($getpageno - 1) * $limit;
    $fetching_pro = "SELECT * from products as p INNER JOIN category as c on p.pcategory = c.Cid  order by pid desc limit {$offset}, {$limit}";
    $pro_result = mysqli_query($connection, $fetching_pro);
    if (mysqli_num_rows($pro_result) > 0) {
       
    
    
    
    ?>
<div class="card">
    <div class="card-header">
      <h3 class="card-title" style="
    color: black;
    font-size: 25px;
    font-family: 'Times New Roman', Times, serif;
    font-style: italic;
    font-weight: bold;">Products Table</h3>
      <a href="" class="btn btn-primary float-right btn-sm" data-bs-toggle="modal" data-bs-target="#AddUserModal"> Add Product </a>
    </div>
    <div class="card-body">
      <table id="example1" class="table table-dark table-bordered text-center table-striped">
        <thead>
          <tr>
           
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($pro_data = mysqli_fetch_assoc($pro_result)) {

            ?>
            <tr>
              <td>
                <?php echo $pro_data['pid'] ?>
              </td>
              <td>
                <?php echo $pro_data['pname'] ?>
              </td>
              <td>
                <?php echo $pro_data['Cname'] ?>
              </td>
              <td>
                <?php echo $pro_data['pdesc'] ?>
              </td>
              <td>
                <?php echo $pro_data['price'] ?>
              </td>
              <td>
                <img src="<?php echo 'images/' . $pro_data['image'] ?>" alt="" height="50px" width="50px">
                
              </td>

              
            </tr>
            <?php
          }
        }
          ?>
        </tbody>
      </table>
      <?php
      $pagination = "SELECT * from `products`";
      $product = mysqli_query($connection, $pagination);

      if(mysqli_num_rows($product) > 0){
        $total_records = mysqli_num_rows($product);
        $pages = ceil($total_records / $limit);
        echo '  <ul class="pagination">';
        if($getpageno > 1){

          echo "<li class='page-item'><a class='page-link' href='addproduct.php?.($getpageno - 1).''> Prev </a></li>";
        }
        for($i = 1; $i <= $pages; $i++){
          $active = $i == $getpageno? "active" : "";
          echo " <li class='page-item'>
          <a class='page-link {$active}' href='addproduct.php?pageno={$i}'>{$i}</a>
          </li>";
        }
        if($pages > $getpageno){
  
          echo "<li class='page-item'><a class='page-link' href='addproduct.php?.($getpageno + 1).''> next </a></li>";
        }
      }
      
      
      ?>
