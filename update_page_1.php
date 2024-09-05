
<?php include('dbcon.php'); ?>



<?php

if(isset($_GET['productID'])){
$id = $_GET['productID'];

    $query = "select * from products where productID = '$id'";

    $result = mysqli_query($connection, $query);


    if(!$result) {
        die("query failed".mysqli_error($connection));
    }
    else{
        $row = mysqli_fetch_assoc($result);
        }
    }

?>

<?php 


        if(isset($_POST['update_list'])){
            if(isset($_GET['id_new'])){
                $idnew = $_GET['id_new'];
            }
            $name = $_POST['productName'];
            $description = $_POST['productDes'];
            $price = $_POST['prodPrice'];
            $quantity = $_POST['productQuant'];
            $create = $_POST['createAt'];
            $update = $_POST['updateAt'];

            $query = "update products set productName = '$name', productDes = '$description', prodPrice = '$price', productQuant = '$quantity', createAt = '$create', updateAt = '$update' where productID = '$idnew'";

            $result = mysqli_query($connection, $query);


            if(!$result) {
                die("query failed".mysqli_error($connection));
            }
            else{
                header('location:index.php?update_msg=You have successfully update the data.');
            }
        }

?>

<form action="update_page_1.php?id_new=<?php echo $id; ?>" method="post">

             <div class="form-group">

                <label for="productName">Name</label>
                <input type="text" name="productName" class="form-control" value="<?php echo $row['productName'] ?>">
                <label for="productDes">Description</label>
                <input type="text" name="productDes" class="form-control" value="<?php echo $row['productDes'] ?>">
                <label for="prodPrice">Price</label>
                <input type="text" name="prodPrice" class="form-control" value="<?php echo $row['prodPrice'] ?>">
                <label for="productQuant">Quantity</label>
                <input type="text" name="productQuant" class="form-control" value="<?php echo $row['productQuant'] ?>">
                <label for="createAt">Create_At</label>
                <input type="text" name="createAt" class="form-control"value="<?php echo $row['createAt'] ?>">
                <label for="updateAt">Update_At</label>
                <input type="text" name="updateAt" class="form-control"value="<?php echo $row['updateAt'] ?>">

            </div>
            <input type="submit" class="btn btn-success" name="update_list" value="UPDATE">
    </form>
