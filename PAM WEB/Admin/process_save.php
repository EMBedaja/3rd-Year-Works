<?php 
	include '../config.php';
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require '../vendor/PHPMailer/src/Exception.php';
	require '../vendor/PHPMailer/src/PHPMailer.php';
	require '../vendor/PHPMailer/src/SMTP.php';
	date_default_timezone_set('Asia/Manila');


	// SAVE ADMIN - ADMIN_MGMT.PHP
	if(isset($_POST['create_admin'])) {
		$user_type		  = mysqli_real_escape_string($conn, $_POST['user_type']);
		$firstname        = mysqli_real_escape_string($conn, $_POST['firstname']);
		$middlename       = mysqli_real_escape_string($conn, $_POST['middlename']);
		$lastname         = mysqli_real_escape_string($conn, $_POST['lastname']);
		$suffix           = mysqli_real_escape_string($conn, $_POST['suffix']);
		$email		      = mysqli_real_escape_string($conn, $_POST['email']);
		$password         = md5($_POST['password']);
		$file             = basename($_FILES["fileToUpload"]["name"]);


		$check_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
		if(mysqli_num_rows($check_email)>0) {
		      $_SESSION['message'] = "Email already exists!";
		      $_SESSION['text'] = "Please try again.";
		      $_SESSION['status'] = "error";
			  header("Location: admin_mgmt.php?page=create");
		} else {

			// Check if image file is a actual image or fake image
		    $target_dir = "../images-users/";
		    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		    $uploadOk = 1;
		    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check == false) {
			    $_SESSION['message']  = "File is not an image.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: admin_mgmt.php?page=create");
		    	$uploadOk = 0;
		    } 

			// Check file size // 500KB max size
			elseif ($_FILES["fileToUpload"]["size"] > 500000) {
			  	$_SESSION['message']  = "File must be up to 500KB in size.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: admin_mgmt.php?page=create");
		    	$uploadOk = 0;
			}

		    // Allow certain file formats
		    elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: admin_mgmt.php?page=create");
			    $uploadOk = 0;
		    }

		    // Check if $uploadOk is set to 0 by an error
		    elseif ($uploadOk == 0) {
			    $_SESSION['message'] = "Your file was not uploaded.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: admin_mgmt.php?page=create");

		    // if everything is ok, try to upload file
		    } else {

	        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        		$save = mysqli_query($conn, "INSERT INTO users (firstname, middlename, lastname, suffix, email, image, password, user_type) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$email', '$file', '$password', '$user_type')");

              	  if($save) {
		          	$_SESSION['message'] = "Administrator has been saved!";
		            $_SESSION['text'] = "Saved successfully!";
			        $_SESSION['status'] = "success";
					header("Location: admin_mgmt.php?page=create");
		          } else {
		            $_SESSION['message'] = "Something went wrong while saving the information.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: admin_mgmt.php?page=create");
		          }
	       			
	        } else {
	        	$_SESSION['message'] = "There was an error uploading your profile picture.";
	            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: admin_mgmt.php?page=create");
	        }
		  }
		}
	}




	// SAVE USERS - USERS_MGMT.PHP
	if(isset($_POST['create_user'])) {
		$firstname        = mysqli_real_escape_string($conn, $_POST['firstname']);
		$middlename       = mysqli_real_escape_string($conn, $_POST['middlename']);
		$lastname         = mysqli_real_escape_string($conn, $_POST['lastname']);
		$suffix           = mysqli_real_escape_string($conn, $_POST['suffix']);
		$email		      = mysqli_real_escape_string($conn, $_POST['email']);
		$password         = md5($_POST['password']);
		$file             = basename($_FILES["fileToUpload"]["name"]);

		$check_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
		if(mysqli_num_rows($check_email)>0) {
		      $_SESSION['message'] = "Email already exists!";
		      $_SESSION['text'] = "Please try again.";
		      $_SESSION['status'] = "error";
			  header("Location: users_mgmt.php?page=create");
		} else {

			// Check if image file is a actual image or fake image
		    $target_dir = "../images-users/";
		    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		    $uploadOk = 1;
		    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check == false) {
			    $_SESSION['message']  = "File is not an image.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: users_mgmt.php?page=create");
		    	$uploadOk = 0;
		    } 

			// Check file size // 500KB max size
			elseif ($_FILES["fileToUpload"]["size"] > 500000) {
			  	$_SESSION['message']  = "File must be up to 500KB in size.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: users_mgmt.php?page=create");
		    	$uploadOk = 0;
			}

		    // Allow certain file formats
		    elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: users_mgmt.php?page=create");
			    $uploadOk = 0;
		    }

		    // Check if $uploadOk is set to 0 by an error
		    elseif ($uploadOk == 0) {
			    $_SESSION['message'] = "Your file was not uploaded.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: users_mgmt.php?page=create");

		    // if everything is ok, try to upload file
		    } else {

	        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        		$save = mysqli_query($conn, "INSERT INTO users (firstname, middlename, lastname, suffix, email, image, password) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$email', '$file', '$password')");

              	  if($save) {
		          	$_SESSION['message'] = "Staff record has been saved!";
		            $_SESSION['text'] = "Saved successfully!";
			        $_SESSION['status'] = "success";
					header("Location: users_mgmt.php?page=create");
		          } else {
		            $_SESSION['message'] = "Something went wrong while saving the information.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: users_mgmt.php?page=create");
		          }
	       			
	        } else {
	        	$_SESSION['message'] = "There was an error uploading your profile picture.";
	            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: users_mgmt.php?page=create");
	        }
		  }
		}
	}





	// SAVE PRODUCT - PRODUCT_MGMT.PHP
	if(isset($_POST['create_product'])) {
		$prod_name       = mysqli_real_escape_string($conn, $_POST['prod_name']);
		$prod_desc       = mysqli_real_escape_string($conn, $_POST['prod_desc']);
		$prod_type       = mysqli_real_escape_string($conn, $_POST['prod_type']);
		$prod_stock      = mysqli_real_escape_string($conn, $_POST['prod_stock']);
		$prod_price      = mysqli_real_escape_string($conn, $_POST['prod_price']);

		$check_email = mysqli_query($conn, "SELECT * FROM product WHERE prod_name='$prod_name'");
		if(mysqli_num_rows($check_email)>0) {
		      $_SESSION['message'] = "Product already exists!";
		      $_SESSION['text'] = "Please try again.";
		      $_SESSION['status'] = "error";
			  header("Location: product_mgmt.php?page=create");
		} else {

			$save = mysqli_query($conn, "INSERT INTO product (prod_name, prod_desc, prod_type, prod_stock, prod_stock_orig, prod_price) VALUES ('$prod_name', '$prod_desc', '$prod_type', '$prod_stock', '$prod_stock', '$prod_price')");

	      	  if($save) {
	          	$_SESSION['message'] = "Product record has been saved!";
	            $_SESSION['text'] = "Saved successfully!";
		        $_SESSION['status'] = "success";
				header("Location: product_mgmt.php?page=create");
	          } else {
	            $_SESSION['message'] = "Something went wrong while saving the information.";
	            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: product_mgmt.php?page=create");
	          }
			
		}
	}





	// SAVE INVENTORY - INVENTORY_MGMT.PHP
	if(isset($_POST['create_inventory'])) {
		$prod_Id     = mysqli_real_escape_string($conn, $_POST['prod_Id']);
		$qty_sold    = mysqli_real_escape_string($conn, $_POST['qty_sold']);
		$total_price = mysqli_real_escape_string($conn, $_POST['total_price']);

		$fetch = mysqli_query($conn, "SELECT * FROM product WHERE prod_Id ='$prod_Id' ");
		$row = mysqli_fetch_array($fetch);
		$stock = $row['prod_stock'];
		$price = $row['prod_price'];

		if($qty_sold > $stock) {
		  $_SESSION['message'] = "Quantity sold must be lesser than ".$stock." ";
	      $_SESSION['text'] = "Please try again.";
	      $_SESSION['status'] = "error";
		  header("Location: inventory_mgmt.php?page=create");
		} else {

			$save = mysqli_query($conn, "INSERT INTO inventory (prod_Id, qty_sold, total) VALUES ('$prod_Id', '$qty_sold', '$total_price')");
      	  if($save) {

      	  	$update = mysqli_query($conn, "UPDATE product SET prod_stock=prod_stock-'$qty_sold' WHERE prod_Id='$prod_Id' ");
      	  	if($update) {
      	  		$_SESSION['message'] = "Inventory has been saved!";
	            $_SESSION['text'] = "Saved successfully!";
		        $_SESSION['status'] = "success";
				header("Location: inventory_mgmt.php?page=create");
      	  	} else {
  	  		    $_SESSION['message'] = "Something went wrong while updating the product stock.";
	            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: inventory_mgmt.php?page=create");
      	  	}

          	
          } else {
            $_SESSION['message'] = "Something went wrong while saving the information.";
            $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: inventory_mgmt.php?page=create");
          }
		}

	}




	// SAVE PRODUCT RECEIVED - PRODUCT_RECEIVED_MGMT.PHP
	if(isset($_POST['create_product_received'])) {
		$supplier_name = mysqli_real_escape_string($conn, $_POST['supplier_name']);
		$prod_Id       = mysqli_real_escape_string($conn, $_POST['prod_Id']);
		$qty_received  = mysqli_real_escape_string($conn, $_POST['qty_received']);
		$date 				 = date('Y-m-d');

		$save = mysqli_query($conn, "INSERT INTO received (prod_Id, supplier_name, qty_received, date_received) VALUES ('$prod_Id', '$supplier_name', '$qty_received', '$date')");
	  if($save) {
	  		$_SESSION['message'] = "Product received has been saved!";
        $_SESSION['text'] = "Saved successfully!";
        $_SESSION['status'] = "success";
				header("Location: product_received_mgmt.php?page=create");
      } else {
        $_SESSION['message'] = "Something went wrong while saving the information.";
        $_SESSION['text'] = "Please try again.";
      	$_SESSION['status'] = "error";
				header("Location: product_received_mgmt.php?page=create");
      }

	}










?>



