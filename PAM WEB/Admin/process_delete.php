<?php 
	include '../config.php';

	// DELETE ADMIN - ADMIN_DELETE.PHP
	if(isset($_POST['delete_admin'])) {
		$user_Id = $_POST['user_Id'];

		$delete = mysqli_query($conn, "DELETE FROM users WHERE user_Id='$user_Id'");
		if($delete) {
	      	$_SESSION['message'] = "Administrator record has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: admin.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: admin.php");
	      }
	}


	// DELETE USER - USERS_DELETE.PHP
	if(isset($_POST['delete_user'])) {
		$user_Id = $_POST['user_Id'];

		$delete = mysqli_query($conn, "DELETE FROM users WHERE user_Id='$user_Id'");
		if($delete) {
	      	$_SESSION['message'] = "Staff record has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: users.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: users.php");
	      }
	}



	// DELETE PRODUCT - PRODUCT_DELETE.PHP
	if(isset($_POST['delete_product'])) {
		$prod_Id= $_POST['prod_Id'];

		$delete = mysqli_query($conn, "DELETE FROM product WHERE prod_Id='$prod_Id'");
		if($delete) {
	      	$_SESSION['message'] = "Product has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: product.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: product.php");
	      }
	}




	// DELETE PRODUCT - PRODUCT_DELETE.PHP
	if(isset($_POST['delete_inventory'])) {
		$Id= $_POST['Id'];

		$fetch = mysqli_query($conn, "SELECT * FROM inventory WHERE Id='$Id' ");
		$row = mysqli_fetch_array($fetch);
		$qty_sold = $row['qty_sold'];
		$prod_Id = $row['prod_Id'];

		// RETURN STOCK TO PRODUCT
		$update = mysqli_query($conn, "UPDATE product SET prod_stock=prod_stock+'$qty_sold' WHERE prod_Id='$prod_Id' ");
		  if($update) {
		  	
	      	$delete = mysqli_query($conn, "DELETE FROM inventory WHERE Id='$Id'");
			if($delete) {
		      	$_SESSION['message'] = "Inventory has been deleted!";
		        $_SESSION['text'] = "Deleted successfully!";
		        $_SESSION['status'] = "success";
				header("Location: inventory.php");
		      } else {
		        $_SESSION['message'] = "Something went wrong while deleting the record";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: inventory.php");
		      }
		      
	      } else {
	        $_SESSION['message'] = "Something went wrong while returning the stocks into product record.";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: inventory.php");
	      }
		
	}
	


	// DELETE PRODUCT RECEIVED - PRODUCT_RECEIVED_DELETE.PHP
	if(isset($_POST['delete_product_received'])) {
		$Id= $_POST['Id'];

		$delete = mysqli_query($conn, "DELETE FROM received WHERE Id='$Id'");
		if($delete) {
	      	$_SESSION['message'] = "Product receive record has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: product_received.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: product_received.php");
	      }
	}




?>




