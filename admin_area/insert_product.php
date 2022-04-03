<!DOCTYPE>

<?php
include("includes/db.php");
?>
<html>
	<head>
		<title>Insert Product</title>
		<link rel="stylesheet" href="../styles/admn.css" media="all">
		<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
	</head>

	<body style="background-color:#FDF2E9">
		<form action="insert_product.php" method="post" enctype="multipart/form-data">
			<center>
				<h1 style="background-color:#FFC300 ; height: 70px; line-height: 65px"><i><center>Enter Product Details</center></i></h1>
		<br>
			<table class="mod" cellspacing="30" cellpadding="3">
			

			<tr>
				<td><i><b>Product Title: </td>
				<td><input type="text" name="product_title" height="50" class="brdr" required/></td>
			</tr>


			<tr>
				<td><i><b>Product Category: </td>
					<td >
				<select name="product_cat" required>
					<option >Select a category</option>
					<?php
						$get_cats = "select * from categories";
						$run_cats = mysqli_query($con, $get_cats);

						while($row_cats = mysqli_fetch_array($run_cats)){
							$cat_id = $row_cats['cat_id'];
							$cat_title = $row_cats['cat_title'];

							echo "<option value='$cat_id'>$cat_title</option>";
						}
					
					?>
				</select>
			</td>
			<tr>
				<td><i><b>Product Brand: </td>
				<td><select name="product_brand" required>
					<option >Select a brand</option>
					<?php
						$get_brands = "select * from brands";
						$run_brands = mysqli_query($con, $get_brands);

						while($row_brands = mysqli_fetch_array($run_brands)){
							$brand_id = $row_brands['brand_id'];
							$brand_title = $row_brands['brand_title'];

							echo "<option value='$brand_id'>$brand_title</option>";
						}
					
					?>
				</select></td>
			</tr>

			<tr>
				<td><i><b>Product Image: </td>
				<td><input type="file" name="product_image" required></td>
			</tr>

			<tr>
				<td><i><b>Product Price: </td>
				<td><input type="text" name="product_price" class="brdr" required/></td>
			</tr>

			<tr>
				<td><i><b>Product Description: </td>
				<td><textarea name="product_desc" style="width: 400px; height: 200px; border: 2px solid; border-radius: 4px;"></textarea></td>
			</tr>

			<tr>
				<td><i><b>Product Keywords: </td>
				<td><input type="text" name="product_keywords" class="brdr" required/></td>
			</tr>
			<tr align="center">
				<td colspan="2"><input type="submit" name="insert_post" value="Insert" style="width: 100px; height:40px; font-size: 20px ;" /></td>
			</tr>
		</table>
	</center>
</form>
</body>
</html>

<?php
	if(isset($_POST['insert_post']))
	{
		$product_title = $_POST['product_title'];
		$product_cat = $_POST['product_cat'];
		$product_brand = $_POST['product_brand'];
		$product_price = $_POST['product_price'];
		$product_desc = $_POST['product_desc'];
		$product_keywords = $_POST['product_keywords'];

		$product_image = $_FILES['product_image']['name'];
		$product_image_tmp = $_FILES['product_image']['tmp_name'];

		move_uploaded_file($product_image_tmp,"product_images/$product_image");

		$insert_product = "INSERT into products(product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords) values('$product_cat','$product_brand','$product_title', '$product_price', '$product_desc','$product_image','$product_keywords')";

		$insert_pro = mysqli_query($con,$insert_product);
		if($insert_pro)
		{
			echo"<script>alert('Product added successfully!')</script>";
			echo"<script>window.open('insert_product.php','_self')</script>";
		}



	}
?>