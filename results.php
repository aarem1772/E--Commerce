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
					<form method="get" action="result.php" enctype="multipart/form-data" >
						<div>
						<center><input type="text" name="user_query" placeholder="Search for products, brands and more" style="vertical-align:30px; height:30px; width:500px; border-radius: 2px; border-width: 0px; padding-left: 5px" />
						<!------<img src="images/searchicon.png" height="20" width="20" style="vertical-align: 25px" name="search" onMouseOver="this.style.cursor='pointer'"/>---->
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
						      	<a href="http://localhost/scripts/ecommerce/details.php?cat_id=1&brand_id=3" >One Plus</a>
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

			<div class="content_ar" style="float:left">
				
				<div id="content_area">
						<?php cart(); ?>
					<?php getIp(); ?>
					<div id="products_box">
						<?php

						if(isset($_GET['search']))
						{

						$search_query = $_GET['user_query'];

						$get_pro = "select * from products where product_keywords like '%$search_query%'";

						$run_pro = mysqli_query($con, $get_pro);
						while($row_pro = mysqli_fetch_array($run_pro))
						{
							$pro_id = $row_pro['product_id'];
							$pro_cat = $row_pro['product_cat'];
							$pro_brand = $row_pro['product_brand'];
							$pro_title = $row_pro['product_title'];
							$pro_price = $row_pro['product_price'];
							$pro_image = $row_pro['product_image'];
							
							echo "
								<div id='single_product'>
									
									<img src='admin_area/product_images/$pro_image' width='270' height='200'/>
									<h3>$pro_title</h3>
									
									<p><b>₹ $pro_price</b></p>

									<a href='details.php?pro_id=$pro_id' style='float:left; text-decoration:none; color:black;'><b>Details</b></a>
									<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>

								</div>
							";
						}
						}
						?>
						
					</div>
				</div>
			</div>
		</div>
		</div>

		<!----<div id="footer" style="background-color: black ; font-family: Arial, Helvetica, sans-serif;">

			<p style="padding-left:10px ;padding-top: 15px; color:white">&copy; 2018 ShopCart Private Limited</p>---->
		</div>
	</body>
</html>
