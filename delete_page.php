<?php include('dbcon.php'); ?>

<?php
if(isset($_GET['productID'])){
    $id = $_GET['productID'];

$query = "DELETE FROM `products` WHERE `productID` = '$id'";

$result = mysqli_query($connection, $query);

if(!$result){
    die("Query Failed".mysqli_error($connection));

}
else{
    header('location:index.php?delete_msg=You have deleted the record.');
}


}
?>
