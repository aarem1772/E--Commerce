<?php


$con = mysqli_connect("localhost","root","","ecommerce");
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " .mysqli_connect_errno();
}

function getCats(){
	global $con;
	$get_cats = "select * from categories";
	$run_cats = mysqli_query($con, $get_cats);
	while($row_cats = mysqli_fetch_array($run_cats)){
		$cat_id = $row_cats['cat_id'];
		$cat_title = $row_cats['cat_title'];

		echo "<a href='#>$cat_title</a>";
	}
}

function getProduct()
{	
	if(!isset($_GET['cat_id']))
	{
		if(!isset($_GET['brand_id']))
		{

			global $con;

			$get_pro = "select * from products order by RAND() LIMIT 0,6";

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


						";

						

						if(isset($_SESSION['customer_name']))
						{
						echo "<a href='details.php?pro_id=$pro_id' style='float:left; text-decoration:none; color:black;'><b>Details</b></a>";
						echo "<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>";

						}
						else
						{
							echo "<center><a href='details.php?pro_id=$pro_id' style=' text-decoration:none; color:black;'><b>Details</b></a></center>";
						}
					echo "</div>";
			}
		}
	}
}

function getPro_Cat_Br()
{	

	if(isset($_GET['cat_id']))
	{
		if(isset($_GET['brand_id']))
		{

			global $con;
			$cat_id = $_GET['cat_id'];
			$brand_id = $_GET['brand_id'];
			
			$get_cat_pro = "select * from products where product_cat='$cat_id' and product_brand='$brand_id'";

			$run_cat_pro = mysqli_query($con, $get_cat_pro);
			while($row_cat_pro = mysqli_fetch_array($run_cat_pro))
			{
				$pro_id = $row_cat_pro['product_id'];
				$pro_cat = $row_cat_pro['product_cat'];
				$pro_brand = $row_cat_pro['product_brand'];
				$pro_title = $row_cat_pro['product_title'];
				$pro_price = $row_cat_pro['product_price'];
				$pro_image = $row_cat_pro['product_image'];
				
				echo "
				<div id='p_box'>
					<div id='s_product'>
						
						<img src='admin_area/product_images/$pro_image' width='270' height='200'/>
						<h3>$pro_title</h3>
						
						<p><b>₹ $pro_price</b></p>

						";

						

						if(isset($_SESSION['customer_name']))
						{
						echo "<a href='details.php?pro_id=$pro_id' style='float:left; text-decoration:none; color:black;'><b>Details</b></a>";
						echo "<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>";

						}
						else
						{
							echo "<center><a href='details.php?pro_id=$pro_id' style=' text-decoration:none; color:black;'><b>Details</b></a></center>";
						}
					echo "</div>";
			}
		}
	}
}

function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}

function cart()
{
	global $con;
	if(isset($_GET['add_cart']))
	{
		$id = $_SESSION['customer_id'];
		$pro_id = $_GET['add_cart'];

		$check_pro = "select * from cart where cust_id='$id' AND p_id='$pro_id'";

		$run_check = mysqli_query($con, $check_pro);

		if(mysqli_num_rows($run_check)>0)
		{
			$q_up = "update cart set qty=qty+1 where p_id = '$pro_id'"; 
			$run_qty = mysqli_query($con, $q_up);
			
			echo "<script>window.open('index.php','_self)</script>";
		}
		else
		{
			$insert_pro = "insert into cart(p_id,cust_id,qty) values('$pro_id','$id',1)";
			$run_pro = mysqli_query($con, $insert_pro);

			echo "<script>window.open('index.php','_self)</script>";
		}
	}
}

function getProductDeals()
{	
	if(!isset($_GET['cat_id']))
	{
		if(!isset($_GET['brand_id']))
		{

			global $con;

			$get_pro = "select * from offers";

			$run_pro = mysqli_query($con, $get_pro);
			while($row_pro = mysqli_fetch_array($run_pro))
			{
				$prd_id = $row_pro['pr_id'];
				$pr_pr = $row_pro['new_price'];
				
				$get_pro_deals = "select * from products where product_id='$prd_id'";

				$run_pro_deals = mysqli_query($con, $get_pro_deals);

				while($row_pro_deals = mysqli_fetch_array($run_pro_deals))
				{

					$pro_id = $row_pro_deals['product_id'];
					$pro_cat = $row_pro_deals['product_cat'];
					$pro_brand = $row_pro_deals['product_brand'];
					$pro_title = $row_pro_deals['product_title'];
					$pro_price = $row_pro_deals['product_price'];
					$pro_image = $row_pro_deals['product_image'];
				
					echo "
					
						<div id='single_product'>
						
							<img src='admin_area/product_images/$pro_image' width='270' height='200'/>
							<h3>$pro_title</h3>
						
							<p><b><del>₹ $pro_price</del> ₹ $pr_pr</b></p>

							";

						

						if(isset($_SESSION['customer_name']))
						{
						echo "<a href='details.php?pro_id=$pro_id' style='float:left; text-decoration:none; color:black;'><b>Details</b></a>";
						echo "<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>";

						}
						else
						{
							echo "<center><a href='details.php?pro_id=$pro_id' style=' text-decoration:none; color:black;'><b>Details</b></a></center>";
						}
					echo "</div>";
				}
			}
		}
	}
}




function getProduct_apple()
{	
	if(!isset($_GET['cat_id']))
	{
		if(!isset($_GET['brand_id']))
		{

			global $con;

			$get_pro = "select * from products where product_brand = 1 order by RAND() LIMIT 0,3";

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


						";

						

						if(isset($_SESSION['customer_name']))
						{
						echo "<a href='details.php?pro_id=$pro_id' style='float:left; text-decoration:none; color:black;'><b>Details</b></a>";
						echo "<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>";

						}
						else
						{
							echo "<center><a href='details.php?pro_id=$pro_id' style=' text-decoration:none; color:black;'><b>Details</b></a></center>";
						}
					echo "</div>";
			}
		}
	}
}