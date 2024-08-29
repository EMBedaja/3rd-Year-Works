<?php 
	include '../config.php';

		
	// UPDATE ADMIN - ADMIN_MGMT.PHP
	if(isset($_POST['update_admin'])) {

		$user_Id		  = mysqli_real_escape_string($conn, $_POST['user_Id']);
		$user_type		  = mysqli_real_escape_string($conn, $_POST['user_type']);
		$firstname        = mysqli_real_escape_string($conn, $_POST['firstname']);
		$middlename       = mysqli_real_escape_string($conn, $_POST['middlename']);
		$lastname         = mysqli_real_escape_string($conn, $_POST['lastname']);
		$suffix           = mysqli_real_escape_string($conn, $_POST['suffix']);
		$email		      = mysqli_real_escape_string($conn, $_POST['email']);
		$file             = basename($_FILES["fileToUpload"]["name"]);

		$get_email = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id'");
		$row = mysqli_fetch_array($get_email);
		$existing_email = $row['email'];

		if(empty($file)) {
			if($existing_email == $email) {

				$update = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', email='$email', user_type='$user_type' WHERE user_Id='$user_Id' ");

              	  if($update) {
		          	$_SESSION['message'] = "Admin record has been updated!";
		            $_SESSION['text'] = "Saved successfully!";
			        $_SESSION['status'] = "success";
					header("Location: admin_mgmt.php?page=".$user_Id);
		          } else {
		            $_SESSION['message'] = "Something went wrong while updating the information.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: admin_mgmt.php?page=".$user_Id);
		          }

			} else {
				$check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
				if(mysqli_num_rows($check) > 0) {
				   $_SESSION['message'] = "Email already exists!";
			       $_SESSION['text'] = "Please try again.";
			       $_SESSION['status'] = "error";
				   header("Location: admin_mgmt.php?page=".$user_Id);
				} else {
					  $update = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', email='$email', user_type='$user_type' WHERE user_Id='$user_Id' ");

	              	  if($update) {
			          	$_SESSION['message'] = "Admin record has been updated!";
			            $_SESSION['text'] = "Saved successfully!";
				        $_SESSION['status'] = "success";
						header("Location: admin_mgmt.php?page=".$user_Id);
			          } else {
			            $_SESSION['message'] = "Something went wrong while updating the information.";
			            $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
						header("Location: admin_mgmt.php?page=".$user_Id);
			          }
				}
			}

		} else {

			if($existing_email == $email) {

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
					header("Location: admin_mgmt.php?page=".$user_Id);
					$uploadOk = 0;
				} 

				// Check file size // 500KB max size
				elseif ($_FILES["fileToUpload"]["size"] > 500000) {
				  	$_SESSION['message']  = "File must be up to 500KB in size.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: admin_mgmt.php?page=".$user_Id);
					$uploadOk = 0;
				}

				// Allow certain file formats
				elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
				    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: admin_mgmt.php?page=".$user_Id);
				    $uploadOk = 0;
				}

				// Check if $uploadOk is set to 0 by an error
				elseif ($uploadOk == 0) {
				    $_SESSION['message'] = "Your file was not uploaded.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: admin_mgmt.php?page=".$user_Id);

				// if everything is ok, try to upload file
				} else {

					if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

					 $update = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', email='$email', user_type='$user_type', image='$file' WHERE user_Id='$user_Id' ");

	              	  if($update) {
			          	$_SESSION['message'] = "Admin record has been updated!";
			            $_SESSION['text'] = "Saved successfully!";
				        $_SESSION['status'] = "success";
						header("Location: admin_mgmt.php?page=".$user_Id);
			          } else {
			            $_SESSION['message'] = "Something went wrong while updating the information.";
			            $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
						header("Location: admin_mgmt.php?page=".$user_Id);
			          }
						
					} else {
						$_SESSION['message'] = "There was an error uploading your profile picture.";
					    $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header("Location: admin_mgmt.php?page=".$user_Id);
					}
				}

				

			} else {
				$check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
				if(mysqli_num_rows($check) > 0) {
				   $_SESSION['message'] = "Email already exists!";
			       $_SESSION['text'] = "Please try again.";
			       $_SESSION['status'] = "error";
				   header("Location: admin_mgmt.php?page=".$user_Id);
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
							header("Location: admin_mgmt.php?page=".$user_Id);
							$uploadOk = 0;
						} 

						// Check file size // 500KB max size
						elseif ($_FILES["fileToUpload"]["size"] > 500000) {
						  	$_SESSION['message']  = "File must be up to 500KB in size.";
						    $_SESSION['text'] = "Please try again.";
						    $_SESSION['status'] = "error";
							header("Location: admin_mgmt.php?page=".$user_Id);
							$uploadOk = 0;
						}

						// Allow certain file formats
						elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
						    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
						    $_SESSION['text'] = "Please try again.";
						    $_SESSION['status'] = "error";
							header("Location: admin_mgmt.php?page=".$user_Id);
						    $uploadOk = 0;
						}

						// Check if $uploadOk is set to 0 by an error
						elseif ($uploadOk == 0) {
						    $_SESSION['message'] = "Your file was not uploaded.";
						    $_SESSION['text'] = "Please try again.";
						    $_SESSION['status'] = "error";
							header("Location: admin_mgmt.php?page=".$user_Id);

						// if everything is ok, try to upload file
						} else {

							if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

							 $update = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', email='$email', user_type='$user_type', image='$file' WHERE user_Id='$user_Id' ");

			              	  if($update) {
					          	$_SESSION['message'] = "Admin record has been updated!";
					            $_SESSION['text'] = "Saved successfully!";
						        $_SESSION['status'] = "success";
								header("Location: admin_mgmt.php?page=".$user_Id);
					          } else {
					            $_SESSION['message'] = "Something went wrong while updating the information.";
					            $_SESSION['text'] = "Please try again.";
						        $_SESSION['status'] = "error";
								header("Location: admin_mgmt.php?page=".$user_Id);
					          }
								
							} else {
								$_SESSION['message'] = "There was an error uploading your profile picture.";
							    $_SESSION['text'] = "Please try again.";
							    $_SESSION['status'] = "error";
								header("Location: admin_mgmt.php?page=".$user_Id);
							}
						}
				}
			}
		}
	}





    // UPDATE USER - USERS_MGMT.PHP
	if(isset($_POST['update_user'])) {

		$user_Id		  = mysqli_real_escape_string($conn, $_POST['user_Id']);
		$firstname        = mysqli_real_escape_string($conn, $_POST['firstname']);
		$middlename       = mysqli_real_escape_string($conn, $_POST['middlename']);
		$lastname         = mysqli_real_escape_string($conn, $_POST['lastname']);
		$suffix           = mysqli_real_escape_string($conn, $_POST['suffix']);
		$email		      = mysqli_real_escape_string($conn, $_POST['email']);
		$file             = basename($_FILES["fileToUpload"]["name"]);

		$get_email = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id'");
		$row = mysqli_fetch_array($get_email);
		$existing_email = $row['email'];

		if(empty($file)) {
			if($existing_email == $email) {

				$update = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', email='$email' WHERE user_Id='$user_Id' ");

              	  if($update) {
		          	$_SESSION['message'] = "Record has been updated!";
		            $_SESSION['text'] = "Saved successfully!";
			        $_SESSION['status'] = "success";
					header("Location: users_mgmt.php?page=".$user_Id);
		          } else {
		            $_SESSION['message'] = "Something went wrong while updating the information.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: users_mgmt.php?page=".$user_Id);
		          }

			} else {
				$check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
				if(mysqli_num_rows($check) > 0) {
				   $_SESSION['message'] = "Email already exists!";
			       $_SESSION['text'] = "Please try again.";
			       $_SESSION['status'] = "error";
				   header("Location: users_mgmt.php?page=".$user_Id);
				} else {
					  $update = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', email='$email' WHERE user_Id='$user_Id' ");

	              	  if($update) {
			          	$_SESSION['message'] = "Record has been updated!";
			            $_SESSION['text'] = "Saved successfully!";
				        $_SESSION['status'] = "success";
						header("Location: users_mgmt.php?page=".$user_Id);
			          } else {
			            $_SESSION['message'] = "Something went wrong while updating the information.";
			            $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
						header("Location: users_mgmt.php?page=".$user_Id);
			          }
				}
			}

		} else {

			if($existing_email == $email) {

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
					header("Location: users_mgmt.php?page=".$user_Id);
					$uploadOk = 0;
				} 

				// Check file size // 500KB max size
				elseif ($_FILES["fileToUpload"]["size"] > 500000) {
				  	$_SESSION['message']  = "File must be up to 500KB in size.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: users_mgmt.php?page=".$user_Id);
					$uploadOk = 0;
				}

				// Allow certain file formats
				elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
				    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: users_mgmt.php?page=".$user_Id);
				    $uploadOk = 0;
				}

				// Check if $uploadOk is set to 0 by an error
				elseif ($uploadOk == 0) {
				    $_SESSION['message'] = "Your file was not uploaded.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: users_mgmt.php?page=".$user_Id);

				// if everything is ok, try to upload file
				} else {

					if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

					 $update = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', email='$email', image='$file' WHERE user_Id='$user_Id' ");

	              	  if($update) {
			          	$_SESSION['message'] = "Record has been updated!";
			            $_SESSION['text'] = "Saved successfully!";
				        $_SESSION['status'] = "success";
						header("Location: users_mgmt.php?page=".$user_Id);
			          } else {
			            $_SESSION['message'] = "Something went wrong while updating the information.";
			            $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
						header("Location: users_mgmt.php?page=".$user_Id);
			          }
						
					} else {
						$_SESSION['message'] = "There was an error uploading your profile picture.";
					    $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
						header("Location: users_mgmt.php?page=".$user_Id);
					}
				}

				

			} else {
				$check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
				if(mysqli_num_rows($check) > 0) {
				   $_SESSION['message'] = "Email already exists!";
			       $_SESSION['text'] = "Please try again.";
			       $_SESSION['status'] = "error";
				   header("Location: users_mgmt.php?page=".$user_Id);
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
							header("Location: users_mgmt.php?page=".$user_Id);
							$uploadOk = 0;
						} 

						// Check file size // 500KB max size
						elseif ($_FILES["fileToUpload"]["size"] > 500000) {
						  	$_SESSION['message']  = "File must be up to 500KB in size.";
						    $_SESSION['text'] = "Please try again.";
						    $_SESSION['status'] = "error";
							header("Location: users_mgmt.php?page=".$user_Id);
							$uploadOk = 0;
						}

						// Allow certain file formats
						elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
						    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
						    $_SESSION['text'] = "Please try again.";
						    $_SESSION['status'] = "error";
							header("Location: users_mgmt.php?page=".$user_Id);
						    $uploadOk = 0;
						}

						// Check if $uploadOk is set to 0 by an error
						elseif ($uploadOk == 0) {
						    $_SESSION['message'] = "Your file was not uploaded.";
						    $_SESSION['text'] = "Please try again.";
						    $_SESSION['status'] = "error";
							header("Location: users_mgmt.php?page=".$user_Id);

						// if everything is ok, try to upload file
						} else {

							if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

							 $update = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', email='$email', image='$file' WHERE user_Id='$user_Id' ");

			              	  if($update) {
					          	$_SESSION['message'] = "Record has been updated!";
					            $_SESSION['text'] = "Saved successfully!";
						        $_SESSION['status'] = "success";
								header("Location: users_mgmt.php?page=".$user_Id);
					          } else {
					            $_SESSION['message'] = "Something went wrong while updating the information.";
					            $_SESSION['text'] = "Please try again.";
						        $_SESSION['status'] = "error";
								header("Location: users_mgmt.php?page=".$user_Id);
					          }
								
							} else {
								$_SESSION['message'] = "There was an error uploading your profile picture.";
							    $_SESSION['text'] = "Please try again.";
							    $_SESSION['status'] = "error";
								header("Location: users_mgmt.php?page=".$user_Id);
							}
						}
				}
			}
		}
	}




	// CHANGE USERS PASSWORD - USERS_DELETE.PHP
	if(isset($_POST['password_user'])) {

    	$user_Id     = $_POST['user_Id'];
    	$OldPassword = md5($_POST['OldPassword']);
    	$password    = md5($_POST['password']);
    	$cpassword   = md5($_POST['cpassword']);

    	$check_old_password = mysqli_query($conn, "SELECT * FROM users WHERE password='$OldPassword' AND user_Id='$user_Id'");

    	// CHECK IF THERE IS MATCHED PASSWORD IN THE DATABASE COMPARED TO THE ENTERED OLD PASSWORD
    	if(mysqli_num_rows($check_old_password) === 1 ) {
			// COMPARE BOTH NEW AND CONFIRM PASSWORD
    		if($password != $cpassword) {
				$_SESSION['message']  = "Password did not matched. Please try again";
            	$_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: users.php");
    		} else {
    			$update_password = mysqli_query($conn, "UPDATE users SET password='$password' WHERE user_Id='$user_Id' ");
    			if($update_password) {
        			$_SESSION['message'] = "Password has been changed.";
	           	    $_SESSION['text'] = "Updated successfully!";
			        $_SESSION['status'] = "success";
					header("Location: users.php");
                } else {
          			$_SESSION['message'] = "Something went wrong while changing the password.";
            		$_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: users.php");
                }
    		}
    	} else {
			$_SESSION['message']  = "Old password is incorrect.";
            $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: users.php");
    	}
    }





	// UPDATE ADMIN INFO - PROFILE.PHP
	if(isset($_POST['update_profile_info'])) {

		$user_Id		  = mysqli_real_escape_string($conn, $_POST['user_Id']);
		$firstname        = mysqli_real_escape_string($conn, $_POST['firstname']);
		$middlename       = mysqli_real_escape_string($conn, $_POST['middlename']);
		$lastname         = mysqli_real_escape_string($conn, $_POST['lastname']);
		$suffix           = mysqli_real_escape_string($conn, $_POST['suffix']);
		$email		      = mysqli_real_escape_string($conn, $_POST['email']);

		$get_email = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id'");
		$row = mysqli_fetch_array($get_email);
		$existing_email = $row['email'];

		if($existing_email == $email) {

				$update = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', email='$email' WHERE user_Id='$user_Id' ");

              	  if($update) {
		          	$_SESSION['message'] = "Record has been updated!";
		            $_SESSION['text'] = "Saved successfully!";
			        $_SESSION['status'] = "success";
					header("Location: profile.php");
		          } else {
		            $_SESSION['message'] = "Something went wrong while updating the information.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: profile.php");
		          }

			} else {
				$check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
				if(mysqli_num_rows($check) > 0) {
				   $_SESSION['message'] = "Email already exists!";
			       $_SESSION['text'] = "Please try again.";
			       $_SESSION['status'] = "error";
				   header("Location: profile.php");
				} else {
					  $update = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', email='$email' WHERE user_Id='$user_Id' ");

	              	  if($update) {
			          	$_SESSION['message'] = "Profile has been updated!";
			            $_SESSION['text'] = "Saved successfully!";
				        $_SESSION['status'] = "success";
						header("Location: profile.php");
			          } else {
			            $_SESSION['message'] = "Something went wrong while updating the information.";
			            $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
						header("Location: profile.php");
			          }
				}
			}
	}



	// CHANGE ADMIN PASSWORD - PROFILE.PHP
	if(isset($_POST['update_password_admin'])) {

    	$user_Id    = $_POST['user_Id'];
    	$OldPassword = md5($_POST['OldPassword']);
    	$password    = md5($_POST['password']);
    	$cpassword   = md5($_POST['cpassword']);

    	$check_old_password = mysqli_query($conn, "SELECT * FROM users WHERE password='$OldPassword' AND user_Id='$user_Id'");

    	// CHECK IF THERE IS MATCHED PASSWORD IN THE DATABASE COMPARED TO THE ENTERED OLD PASSWORD
    	if(mysqli_num_rows($check_old_password) === 1 ) {
			// COMPARE BOTH NEW AND CONFIRM PASSWORD
    		if($password != $cpassword) {
				$_SESSION['message']  = "Password does not matched. Please try again";
            	$_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: profile.php");
    		} else {
    			$update_password = mysqli_query($conn, "UPDATE users SET password='$password' WHERE user_Id='$user_Id' ");
    			if($update_password) {
                	$_SESSION['message'] = "Password has been changed.";
		            $_SESSION['text'] = "Updated successfully!";
			        $_SESSION['status'] = "success";
					header("Location: profile.php");
                } else {
                    $_SESSION['message'] = "Something went wrong while changing the password.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: profile.php");
                }
    		}
    	} else {
			$_SESSION['message']  = "Old password is incorrect.";
            $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: profile.php");
    	}

    }




  	// UPDATE ADMIN PROFILE - PROFILE.PHP
	if(isset($_POST['update_profile_admin'])) {

		$user_Id    = $_POST['user_Id'];
		$file       = basename($_FILES["fileToUpload"]["name"]);

		  // Check if image file is a actual image or fake image
	    $target_dir = "../images-users/";
	    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	    $uploadOk = 1;
	    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check == false) {
		    $_SESSION['message']  = "Selected file is not an image.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: profile.php");
	    	$uploadOk = 0;
	    } 

		// Check file size // 500KB max size
		elseif ($_FILES["fileToUpload"]["size"] > 500000) {
		  	$_SESSION['message']  = "File must be up to 500KB in size.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: profile.php");
	    	$uploadOk = 0;
		}

	    // Allow certain file formats
	    elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
		    $_SESSION['message']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: profile.php");
	    	$uploadOk = 0;
	    }

	    // Check if $uploadOk is set to 0 by an error
	    elseif ($uploadOk == 0) {
		    $_SESSION['message']  = "Your file was not uploaded.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: profile.php");

	    // if everything is ok, try to upload file
	    } else {

	        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	          	$save = mysqli_query($conn, "UPDATE users SET image='$file' WHERE user_Id='$user_Id'");
	     
	            if($save) {
	            	$_SESSION['message'] = "Profile picture has been updated!";
		            $_SESSION['text'] = "Updated successfully!";
			        $_SESSION['status'] = "success";
					header("Location: profile.php");
	            } else {
		            $_SESSION['message'] = "Something went wrong while updating the information.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: profile.php");
	            }
	        } else {
	            $_SESSION['message'] = "There was an error uploading your file.";
	            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: profile.php");
	        }

		}
	}






	// PRODUCT USERS - PRODUCT_MGMT.PHP
	if(isset($_POST['update_product'])) {
		$prod_Id         = mysqli_real_escape_string($conn, $_POST['prod_Id']);
		$prod_name       = mysqli_real_escape_string($conn, $_POST['prod_name']);
		$prod_desc       = mysqli_real_escape_string($conn, $_POST['prod_desc']);
		$prod_type       = mysqli_real_escape_string($conn, $_POST['prod_type']);
		$prod_stock      = mysqli_real_escape_string($conn, $_POST['prod_stock']);
		$prod_price      = mysqli_real_escape_string($conn, $_POST['prod_price']);

		$check_email = mysqli_query($conn, "SELECT * FROM product WHERE prod_name='$prod_name' AND prod_Id='$prod_Id' ");
		if(mysqli_num_rows($check_email)>0) {

			$update = mysqli_query($conn, "UPDATE product SET prod_name='$prod_name', prod_desc='$prod_desc', prod_type='$prod_type', prod_stock='$prod_stock', prod_stock_orig='$prod_stock', prod_price='$prod_price' WHERE prod_Id='$prod_Id' ");

	      	  if($update) {
	          	$_SESSION['message'] = "Product record has been updated!";
	            $_SESSION['text'] = "Updated successfully!";
		        $_SESSION['status'] = "success";
				header("Location: product_mgmt.php?page=".$prod_Id);
	          } else {
	            $_SESSION['message'] = "Something went wrong while saving the information.";
	            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: product_mgmt.php?page=".$prod_Id);
	          }

		      
		} else {

			$check_email = mysqli_query($conn, "SELECT * FROM product WHERE prod_name='$prod_name'");
			if(mysqli_num_rows($check_email)>0) {
			      $_SESSION['message'] = "Product already exists!";
			      $_SESSION['text'] = "Please try again.";
			      $_SESSION['status'] = "error";
				  header("Location: product_mgmt.php?page=".$prod_Id);
			} else {

				$update = mysqli_query($conn, "UPDATE product SET prod_name='$prod_name', prod_desc='$prod_desc', prod_type='$prod_type', prod_stock='$prod_stock', prod_stock_orig='$prod_stock', prod_price='$prod_price' WHERE prod_Id='$prod_Id' ");

		      	  if($update) {
		          	$_SESSION['message'] = "Product record has been updated!";
		            $_SESSION['text'] = "Updated successfully!";
			        $_SESSION['status'] = "success";
					header("Location: product_mgmt.php?page=".$prod_Id);
		          } else {
		            $_SESSION['message'] = "Something went wrong while updating the information.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: product_mgmt.php?page=".$prod_Id);
		          }

			}
			
		}
	}





	// UPDATE INVENTORY - INVENTORY_MGMT.PHP
	if(isset($_POST['update_inventory'])) {
		
		$Id          = mysqli_real_escape_string($conn, $_POST['Id']);
		$prod_Id     = mysqli_real_escape_string($conn, $_POST['prod_Id']);
		$qty_sold    = mysqli_real_escape_string($conn, $_POST['qty_sold']);
		$total_price = mysqli_real_escape_string($conn, $_POST['total_price']);

		

		$fetch = mysqli_query($conn, "SELECT * FROM product WHERE prod_Id ='$prod_Id' ");
		$row = mysqli_fetch_array($fetch);
		$stock = $row['prod_stock'];


		if($qty_sold > $stock) {
		  $_SESSION['message'] = "Quantity sold must be lower than ".$stock." ";
	      $_SESSION['text'] = "Please try again.";
	      $_SESSION['status'] = "error";
		  header("Location: inventory_mgmt.php?page=".$Id);
		} else {
			$update = mysqli_query($conn, "UPDATE inventory SET prod_Id='$prod_Id', qty_sold='$qty_sold', total='$total_price' WHERE Id='$Id'");
	      	  if($update) {

	      	  	$all = mysqli_query($conn, "SELECT SUM(qty_sold) AS sum_old FROM inventory WHERE prod_Id = '$prod_Id' ");
				$row_all = mysqli_fetch_array($all);
				$total = $row['prod_stock_orig'] - $row_all['sum_old'];

	      	  	$update2 = mysqli_query($conn, "UPDATE product SET prod_stock='$total' WHERE prod_Id='$prod_Id' ");
	      	  	if($update2) {
	      	  		$_SESSION['message'] = "Inventory has been updated!";
		            $_SESSION['text'] = "Saved successfully!";
			        $_SESSION['status'] = "success";
					header("Location: inventory_mgmt.php?page=".$Id);
	      	  	} else {
      	  		    $_SESSION['message'] = "Something went wrong while updating the product stock.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: inventory_mgmt.php?page=".$Id);
	      	  	}

	          	
	          } else {
	            $_SESSION['message'] = "Something went wrong while updating the information.";
	            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: inventory_mgmt.php?page=".$Id);
	          }
		}

	}




	// UPDATE PRODUCT RECEIVED - PRODUCT_RECEIVED_MGMT.PHP
	if(isset($_POST['update_product_received'])) {
		$Id            = mysqli_real_escape_string($conn, $_POST['Id']);
		$supplier_name = mysqli_real_escape_string($conn, $_POST['supplier_name']);
		$prod_Id       = mysqli_real_escape_string($conn, $_POST['prod_Id']);
		$qty_received  = mysqli_real_escape_string($conn, $_POST['qty_received']);

		$save = mysqli_query($conn, "UPDATE received SET prod_Id='$prod_Id', supplier_name='$supplier_name', qty_received='$qty_received' WHERE Id='$Id' ");
	  if($save) {
	  		$_SESSION['message'] = "Product received has been updated!";
	        $_SESSION['text'] = "Saved successfully!";
	        $_SESSION['status'] = "success";
			header("Location: product_received_mgmt.php?page=".$Id);
      } else {
	        $_SESSION['message'] = "Something went wrong while updating the information.";
	        $_SESSION['text'] = "Please try again.";
	      	$_SESSION['status'] = "error";
			header("Location: product_received_mgmt.php?page=".$Id);
      }

	}


?>
