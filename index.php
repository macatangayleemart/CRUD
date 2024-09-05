
    <?php include('dbcon.php'); ?>


    <div class="box1">
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ADD</button>
        </div>
        
    <table  id="datatableID" class="table ">
        <thead>
            <tr>
                <th>Product Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Created At</th>
                <th>Updated At</th>
                
            </tr>           
        </thead>
        <tbody>

            <?php 
            
                $query = "select * from `products`";

                $result = mysqli_query($connection, $query);

                if(!$result){
                    die("query failed".mysqli_error($connection));
                }
                else{
                    while($row = mysqli_fetch_assoc($result)){
                        ?>

                        <tr>
                            <td><?php echo $row['productID']; ?></td>
                            <td><?php echo $row['productName']; ?></td>
                            <td><?php echo $row['productDes']; ?></td>
                            <td><?php echo $row['prodPrice']; ?></td>
                            <td><?php echo $row['productQuant']; ?></td>
                            <td><?php echo $row['createdAt']; ?></td>
                            <td><?php echo $row['updatedAt']; ?></td>
                            <td><a href="update_page_1.php?id=<?php echo $row['productID']; ?>" class="btn btn-primary">Edit</a></td>
                            <td><a href="delete_page.php?id=<?php echo $row['productID']; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                        
                        <?php
                    }
                }
            
            ?>
           
        </tbody>
    </table>

    <?php 
    
    if(isset($_GET['message'])){
        echo "<h6>".$_GET['message']."</h6>";
    }
    
    ?>

    <form action="insert_data.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insert Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="container my-5">
        <form method="post">
            <div class="row mb-3">
                    <label  for="productName">Name</label>
                <div class="col-sm-6">
                    <input type="text" name="productName" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                    <label for="productDes">Description</label>
                <div class="col-sm-6">
                    <input type="text" name="productDes" class="form-control">
               </div>
               </div>
            <div class="row mb-3">
                    <label  for="prodPrice">Price</label>
                <div class="col-sm-6">
                    <input type="text" name="prodPrice" class="form-control">
                </div>
                </div>
            <div class="row mb-3">
                    <label  for="productQuant">Quantity</label>
                <div class="col-sm-6">
                    <input type="text" name="productQuant" class="form-control">
                    </div>
                </div>
            <div class="row mb-3">
                    <label for="createdAt">Created At</label>
                <div class="col-sm-6">
                    <input type="datetime-local" name="createdAt" class="form-control">
                    </div>
                </div>
            <div class="row mb-3">
                    <label for="updatedAt">Updated At</label>
                <div class="col-sm-6">
                    <input type="datetime-local" name="updatedAt" class="form-control">

                </div>
                </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="insert" value="ADD">
      </div>
    </div>
    </form>
  
</div>
</form>
    

    