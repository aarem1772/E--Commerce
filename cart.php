<!DOCTYPE>
<html>
	<head>
		<title>Shopcart</title>
		<link rel="stylesheet" href="styles/style.css" media="all">
		<link rel="stylesheet" href="styles/test.css" media="all">
		<link rel="stylesheet" href="styles/loginstyle.css" media="all">
		<link rel="stylesheet" href="styles/products.css" media="all">
		<?php
			session_start();
			include("functions/functions.php");
		?>
	</head>

	<body style="margin: 0px">
	

		<div class="main_wrapper">
			<div style="background-color:#3498DB ; height:70px" >
				
				
				
				<img src="images/logo.png" height="70" width="70" style="float : left">
				<i style="vertical-align:-10px ;"><b>SHOPCART</b></i>
				<br>
				<i style="float:left"><b>Explore+</b></i>

				<div id="form">
					<form method="get" action="results.php" enctype="multipart/form-data" >
						<div>
						<center><input type="text" name="user_query" placeholder="Search for products, brands and more" style="vertical-align:30px; height:30px; width:500px; border-radius: 2px; border-width: 0px; padding-left: 5px" />
						<!----<img src="images/searchicon.png" height="20" width="20" style="vertical-align: 25px" onMouseOver="this.style.cursor='pointer'"/>----->
						<input type="submit" name="search" value="Search" style="vertical-align:30px; height: 30px ;border-radius: 4px; border-width: 0px; color:white; background-color: black" onMouseOver="this.style.cursor='pointer'"/></center>
					</div>
					</form>
				</div>

			</div>
			<hr style="margin:0; height:2px; background-color: black; border:none">
		

			
				<div class="navbar">
  					<a href="http://localhost/scripts/ecommerce">Home</a>
	  
		  			<div class="dropdown">
		    				<button class="dropbtn">Mobile 
		    					
		      				<i class="fa fa-caret-down"></i>
		    				</button>
		   			 		<div class="dropdown-content">
		      					<a href="http://localhost/scripts/ecommerce/details.php?cat_id=1&brand_id=1">Apple</a>
						      	<a href="http://localhost/scripts/ecommerce/details.php?cat_id=1&brand_id=2">Samsung</a>
						      	<a href="http://localhost/scripts/ecommerce/details.php?cat_id=1&brand_id=3">One Plus</a>
						      	<a href="http://localhost/scripts/ecommerce/details.php?cat_id=1&brand_id=4">Xiaomi</a>
						      	<a href="http://localhost/scripts/ecommerce/details.php?cat_id=1&brand_id=5">Nokia</a>
						  	</div>
					</div>
					  <div class="dropdown">
						<button class="dropbtn">Laptops 
		      			<i class="fa fa-caret-down"></i>
		    			</button>
		   			 	<div class="dropdown-content">
		      				 <a href="http://localhost/scripts/ecommerce/details.php?cat_id=2&brand_id=6">DELL</a>
						     <a href="http://localhost/scripts/ecommerce/details.php?cat_id=2&brand_id=7">Lenovo</a>
						     <a href="http://localhost/scripts/ecommerce/details.php?cat_id=2&brand_id=8">HP</a>
						     <a href="http://localhost/scripts/ecommerce/details.php?cat_id=2&brand_id=1">Apple</a>
						     <a href="http://localhost/scripts/ecommerce/details.php?cat_id=2&brand_id=9">Acer</a>
						</div>
					</div>
					 <div class="dropdown">
							<button class="dropbtn">Footwear 
			      			<i class="fa fa-caret-down"></i>
			    			</button>
			   				<div class="dropdown-content">
			      				<a href="http://localhost/scripts/ecommerce/details.php?cat_id=3&brand_id=10">Nike</a>
							     <a href="http://localhost/scripts/ecommerce/details.php?cat_id=3&brand_id=11">Adidas</a>
							     <a href="http://localhost/scripts/ecommerce/details.php?cat_id=3&brand_id=12">Puma</a>
							     <a href="http://localhost/scripts/ecommerce/details.php?cat_id=3&brand_id=13">Reebok</a>
							     <a href="http://localhost/scripts/ecommerce/details.php?cat_id=3&brand_id=14">Sparx</a>
							</div>
					</div>
					<div class="dropdown">
							<button class="dropbtn">Watches 
			      			<i class="fa fa-caret-down"></i>
			    			</button>
			    			<div class="dropdown-content">
								<a href="http://localhost/scripts/ecommerce/details.php?cat_id=4&brand_id=15">Fastrack</a>
								<a href="http://localhost/scripts/ecommerce/details.php?cat_id=4&brand_id=16">Titan</a>
								<a href="http://localhost/scripts/ecommerce/details.php?cat_id=4&brand_id=17">Fossil</a>
								<a href="http://localhost/scripts/ecommerce/details.php?cat_id=4&brand_id=18">Casio</a>
								<a href="http://localhost/scripts/ecommerce/details.php?cat_id=4&brand_id=19">Sonata</a>
							</div>
					</div>
					<?php

						if(!isset($_SESSION['customer_name'])){


						
						echo "<a style='float:right; text-decoration:none;' href='customer/login.php'>Login and SignUp</a>";
						
						}

						else{
							$cust_name = $_SESSION['customer_name'];
							echo "<a style='float:right; text-decoration:none;' href='logout.php'>Logout</a>";
							echo "<a style='text-decoration:none;float:right' href='my_account.php'>Welcome $cust_name !</a>";
							echo "<a href='cart.php' style='float: right; text-decoration: none;' >My Cart</a>";
						}



						?>

				  </div>
				</div>
				<?php
				if(isset($_GET['cat_id']))
				{
					if(isset($_GET['brand_id']))
					{
						getPro_Cat_Br();
					}
				}
				?>
			<div class="content_ar">
				
				<div id="content_area">
					<?php cart(); ?>
					<?php getIp(); ?>
					<div id="products_box">
						<form action="" method="post" enctype="multipart/form-data">
							<table align="center" border="2px" style="border:2px solid black; border-collapse: collapse;">
								<tr>
									<th>Remove</th>
									<th>Product(s)</th>
									<th>Quantity</th>
									<th>Price</th>
									<br>
								</tr>

								<?php
									$total =0;
									$id= $_SESSION['customer_id'];
									$sel_price = "select * from cart where cust_id = '$id'";

									$run_price = mysqli_query($con, $sel_price);

									while($p_price = mysqli_fetch_array($run_price))
									{
										$pro_id = $p_price['p_id'];
										$qty = $p_price['qty'];
										$pro_price = "select * from products where product_id='$pro_id'";

										$run_pro_price = mysqli_query($con, $pro_price);

										while($pp_price = mysqli_fetch_array($run_pro_price))
										{
											$product_price = array($pp_price['product_price']);
											$product_title = $pp_price['product_title'];

											$product_image = $pp_price['product_image'];

											$single_price = $pp_price['product_price']*$qty;

											$values = array_sum($product_price);
											$total +=$values*$qty;

										
											?>
											<tr>
												<td style="height:20px" colspan="4"></td>
											</tr>
								<tr align = "center">

									<td style="width: 100px"><input type="checkbox" name="remove[]"value="<?php echo $pro_id; ?>"/></td>
									<td style="width: 300px"><b><?php echo $product_title; ?></b><br>
										<img src="admin_area/product_images/<?php echo $product_image; ?>" width="170" height="100"></td>

									<td style="width: 150px"><?php echo $qty; ?></td>
									

									<td style="width: 200px"><?php echo "₹" . $single_price; ?></td>
								</tr>


								<?php	}
								}
								?>
								<tr>
									<td style="height:20px" colspan="4"></td>
								</tr>

								<tr align = "right">
									<td colspan="3"><b>Total</b></td>
									<td><?php echo "₹" . $total ?></td>
								</tr>
								<tr> 
									<td style="height:20px" colspan="4"></td>
								</tr>
								<tr align="center">
									<td style="border-right-style: hidden;"><input type="submit" name="update_cart" value="Update Cart" /></td>

									<td colspan="2" style="border-right-style: hidden;"><input type="submit" name="continue" value="Continue Shopping"/></td>

									<td><button><a href="checkout.php" style="text-decoration: none; color: black;">Checkout</a></button></td>
								</tr>
							</table>

						</form>
						<?php

						
							global $con;

							$id = $_SESSION['customer_id'];
							if (isset($_POST['update_cart']))
							{
								foreach($_POST['remove'] as $remove_id)
								{
									$delete_product = "delete from cart where p_id ='$remove_id' AND cust_id='$id'";

									$run_delete = mysqli_query($con, $delete_product);

									if($run_delete)
									{
										echo "<script>window.open('cart.php','_self')</script>";
									}
								}
							}
							if(isset($_POST['continue']))
							{
								echo "<script>window.open('index.php','_self')</script>";
							}

						?>
						

					</div>
				
				</div>
			</div>

			</div>

		</div>
		<!-----<div id="footer" style="background-color: black ; font-family: Arial, Helvetica, sans-serif;">

			<p style="padding-left:10px ;padding-top: 15px; color:white">&copy; 2018 ShopCart Private Limited</p>--->
	</body>
</html>
