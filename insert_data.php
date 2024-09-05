<?php  
include 'dbcon.php'; 

if (isset($_POST['insert'])) {
    $name = $_POST['productName'];
    $des = $_POST['productDes'];
    $price = $_POST['prodPrice'];
    $quan = $_POST['productQuant'];
    $createdAt = $_POST['createdAt'];
    $updatedAt = $_POST['updatedAt'];

    if (empty($name)) {
        header('Location: index.php?message=You need to fill in the name field');
        exit(); 
    } else {
        $query = "insert into `products` (`productName`, `productDes`, `prodPrice`, `productQuant`, `createdAt`, `updatedAt`) 
        values ('$name', '$des', '$price', '$quan', '$createdAt', '$updatedAt')";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query Failed: " . mysqli_error($connection));
        } else {
            header('Location: index.php?insert_msg=Your data has been added successfully');
            exit(); 
        }
    }
}
?>
