<!DOCTYPE html>
<html>
<head>
	<title>Upload File</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>

<h1 class="col text-center bg-success p-2">Upload File Using PHP</h1>




<div class="container">
	<div class="row">
		<form class="col-sm-6" method="POST" action="<?php $_SERVER["PHP_SELF"]; ?>"  
			enctype="multipart/form-data" >

		    <div class="form-group">
			    <label >Image</label>
			    <input type="file" name="image"  class="form-control"  >
		    </div>

		     <div class="form-group">
			   	<hr>
		    </div>

		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>


		<div class="col-sm-6">

		<?php

			$errors = "";
			$success = "";
        
            if($_SERVER["REQUEST_METHOD"] == "POST")
			{

				$file = $_FILES["image"];

				$file_name = $file["name"]; /// كاتب المتغبر f_name
				$file_full_path = $file["full_path"]; // محفوظ مش عاملها
				$file_type = $file["type"];
				$file_tmp_name = $file["tmp_name"];
				$file_size = $file["size"];
				$file_error = $file["error"];

				

				if($file_name != "")
				{

						$info = pathinfo($file_name); // وممكن ب full path
						

						$original_filename  = $info["filename"];
						$original_extension = $info["extension"]; 


						$allowed = ["png","jpg","jpeg","gif"];

						if(in_array($original_extension, $allowed)){

							if($file_error === 0)
							{

								if($file_size < 1e+6)
								{ // 1e+6 mb(مليون) == 1000kb 
								
									$new_name = uniqid("",true).".".$original_extension;
									$destination = "upload/" . $new_name;
									move_uploaded_file($file_tmp_name,$destination);

									$success = "your file have been uploded successfully";
									

								}else{
									$errors = "your file is too big";
								}	

							}else{
								$errors = "you have an error in your file";
							}


						}else{
							$errors = "your file is not allowed";
						}

					
				}else{
					$errors = "Please Choose Image";
				}

				
            }

        ?>
		

	

		<?php if($errors != ""):  ?>
			<h4 class="alert alert-danger col text-center"> <?php echo $errors; ?></h4>
			<?php endif; ?>

		<?php if($success != ""):  ?>
			<h4 class="alert alert-danger col text-center"> <?php echo $success; ?></h4>
			<?php endif; ?>
			

			<!-- طريقه محفوظ بالاقواس -->
			<!-- <?php if($errors != ''){  ?>
			<h4 class="alert alert-danger col text-center"><?php echo $errors; ?></h4>
			<?php } ?> -->



		</div>
	</div>						
</div>




<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
</body>
</html>