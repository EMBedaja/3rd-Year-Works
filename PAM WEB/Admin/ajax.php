<?php 
	include '../config.php';
	if(isset($_POST['product_id'])){
    $productID = $_POST['product_id'];

    $fetch = mysqli_query($conn, "SELECT * FROM product WHERE prod_Id='$productID' ");
    $row = mysqli_fetch_array($fetch);

    $price = $row['prod_price'];

    // Remove all non-numeric characters from the price value
    $price = preg_replace("/[^0-9]/", "", $price);

    // Return the price as a response
    header('Content-Type: text/plain');
    echo $price;
}

?>




