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
					<form method="get" action="results.php" enctype="multipart/form-data">
						<div>
						<center><input type="text" name="user_query" placeholder="Search for products, brands and more" style="vertical-align:30px; height:30px; width:500px; border-radius: 2px; border-width: 0px; padding-left: 5px" />
						<!---<img src="images/searchicon.png" height="20" width="20" style="vertical-align: 25px" onMouseOver="this.style.cursor='pointer'" name="search"/>---->
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
					<style>
						/*.spanclass
						{
							float:right;
							color:white;
						}*/
					</style>
					<?php

						if(!isset($_SESSION['customer_name'])){


						
						echo "<a style='float:right; text-decoration:none;' href='customer/login.php'>Login and SignUp</a>";
						
						}

						else{
							$cust_name = $_SESSION['customer_name'];
							echo "<a style='float:right; text-decoration:none;' href='logout.php'>Logout</a>";
							echo "<a style='text-decoration:none;float:right' href='customer/my_account.php'>Welcome $cust_name !</a>";
							echo "<a href='cart.php' style='float: right; text-decoration: none;' >My Cart</a>";
							}
						?>
						

				  </div>

				

				
			<center>
			<div style="background-color: black ; display:block ;height: 300px ; overflow: hidden ;"  >
  <img class="mySlides" src="images/ss1.png">
  <img class="mySlides" src="images/ss2.png">
  <img class="mySlides" src="images/ss3.png">
  <img class="mySlides" src="images/ss4.png">
    <img class="mySlides" src="images/ss5.png">
      <img class="mySlides" src="images/ss6.png">

</div></center>
			<script>
			var myIndex = 0;
			carousel();

			function carousel() {
			    var i;
			    var x = document.getElementsByClassName("mySlides");
			    for (i = 0; i < x.length; i++) {
			       x[i].style.display = "none";
			    }
			    myIndex++;
			    if (myIndex > x.length) {myIndex = 1}
			    x[myIndex-1].style.display = "block";
			    setTimeout(carousel, 2000); // Change image every 2 seconds
			}
			</script>
			
			
			<div class="content_ar" style="float:left">
				
				<div id="content_area">
					 <?php cart(); ?>
					<?php getIp(); ?>
					<div id="products_box">
						<?php getProduct(); ?>
					</div>
					<div id="ofr_ar">
					<h2 style="padding-left: 60px">DEALS OF THE DAY</h2>
						<div id="products_box">
							<?php getProductDeals(); ?>
						</div>
					</div>
					<div id="ofr_ar"  >
						<h2 style="padding-left: 60px">APPLE</h2>
							<div id="products_box" style="background-color: red">
							<?php getProduct_apple(); ?>
						</div>


					</div>


					</div>

					<div id="featured_brands">
					<h2 style="padding-left: 60px">FEAUTURED BRANDS</h2>
						<div id ="products_box" style="background-color: WHITE ; display:block ; overflow: hidden ;"  >
  							<a href="http://localhost/scripts/ecommerce/details.php?cat_id=1&brand_id=1"><img src="images/applefinal.svg" width="70px" height="70px"></a>
  							<a href="http://localhost/scripts/ecommerce/details.php?cat_id=4&brand_id=17"><img src="images/fossil.svg" width="70px" height="70px"></a>
  							<a href="http://localhost/scripts/ecommerce/details.php?cat_id=2&brand_id=8"><img src="images/hp.svg" width="70px" height="70px"></a>
  							<a href="http://localhost/scripts/ecommerce/details.php?cat_id=4&brand_id=18"><img src="images/casio.svg" width="70px" height="70px"></a>
  							<a href="http://localhost/scripts/ecommerce/details.php?cat_id=1&brand_id=4"><img src="images/mi.svg" width="70px" height="70px"></a>
  							<img src="images/nokia.svg" width="70px" height="70px">
  							<img src="images/samsung.svg" width="70px" height="70px">
  							<img src="images/nike.svg" width="70px" height="70px">
  							<img src="images/dell.svg" width="70px" height="70px">
  							<img src="images/lenovo.svg" width="70px" height="70px">
  							<img src="images/adidas.svg" width="70px" height="70px">
  							<img src="images/sonata.svg" width="70px" height="70px">
  							<img src="images/puma.svg" width="70px" height="70px">
  							<img src="images/acer.svg" width="70px" height="70px">
  							
  						</div>
  					</div>

  				</div>
  					
 	




				</div>
			</div>
		</div>
		</div>
	






		<!----<div id="footer" style="background-color: black ; font-family: Arial, Helvetica, sans-serif;">

			<p style="padding-left:10px ;padding-top: 15px; color:white">&copy; 2018 ShopCart Private Limited</p>---->
		</div>
		<br>
		<br>
		<br>
		<div class="final_info" style="float:left; background-color: darkslategrey" >
			<div id="final_information">
				
				<center>
				<table ul style="text-align:left; float: left">
				  <tr>
				    <th align="left" col width="60" col height="40"><font color="darkgrey">ABOUT</font></th>
				     <th align="left" col width="60" col height="40"><font color="darkgrey">POLICY</font></th>
				     <th align="left" col width="60" col height="40"><font color="darkgrey">HELP</font></th>
				     <th align="left" col width="60" col height="40"><font color="darkgrey">SOCIAL</font></th>
			      </tr>
				  <tr>
				    <td width="30%"><font color="white"><a href="aboutus.php">About Us</a></font></td>
				    <td width="30%"><font color="white">Return Policy</font></td>
				    <td width="30%"><font color="white">Payment</font></td>
				    <td width="30%"><font color="white">Facebook</font></td>
				   </tr>

				   
				  <tr>
				    <td width="30%"><font color="white">Contact Us</font></td>
				    <td width="30%"><font color="white">Exchange Policy</font></td>
				    <td width="30%"><font color="white">Shipping</font></td>
				    <td width="30%"><font color="white">Instagram</font></td>
				  </tr>
				  <tr>
				    <td width="30%"><font color="white">Careers</font></td>
				    <td width="30%"><font color="white">Privacy</font></td>
				    <td width="30%"><font color="white">Report Infringement</font></td>
				    <td width="30%"><font color="white">Twitter</font></td>
				  </tr>
				  <tr>
				    <td width="30%"><font color="white">Terms of Use</font></td>
				    <td width="30%"><font color="white">Security</font></td>
				    <td width="30%"><font color="white">EPR Compliance</font></td>
				    <td width="30%"><font color="white">Google+</font></td>
				  </tr>
				  <tr>
				  	<td></td>
				  	<td width="30%"><font color="white">Shopkart cares</font></td>
				  	<td></td>
				  	<td></td>
				  </tr>
				</table>
			</center>
				<p><font color="darkgrey"><center>REGISTERED ADDRESS:</center></font></p>
				<p><font color="white"><center>Shopkart Internet Private Limited,<br>Vaishnavi Summit, Ground Floor, 7th Main<br>80 Feet Road, 3rd Block,<br>Koramangala,Bengaluru - 560034<br>India<br>CIN : U51109KA2012PTC066107<br>Telephone: 1808 206 9696</center></font></p>
				<br>
				<center>
				<img src="images/logo.png" height="70" width="70" >
				<p style="padding-left:10px ;padding-top: 15px; color:white">&copy; 2018 ShopCart Private Limited</p>
				</center>
			</div>
		</div>
	</body>

</html>
