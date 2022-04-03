<!DOCTYPE>
<?php
	session_start();
	include("../includes/db.php");
	include("../functions/functions.php");
	
?>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="../styles/loginstylef.css">
</head>
<style>
	body{
		background-image: url("p_page.jpg");
	}
</style>
	<body>
		<div class="login-box" style="border-radius: 10px">
			<img src="logo.png" class="a1">
			<br>
			<br>
				<h1>Create an Account</h1>
					<form method="post" action="customer_registrationf.php"  enctype="multipart/form-data>
						<p style="padding-left: 4px">Customer Name</p>
						<input type="text" name="customer_name" required  placeholder="Enter Name" style="padding-left: 4px; color:white">
						<br>
						<br>
						<p style="padding-left: 4px">Customer Email</p>
						<input type="text" name="customer_email" required placeholder="Enter Email" style="padding-left: 4px; color:white">
						<br>
						<br>
						<p style="padding-left: 4px">Password</p>
						<input type="password" name="pass" required placeholder="Enter Password" style="padding-left: 4px;  color:white" >
						<br>
						<br>
						<p style="padding-left: 4px">Customer Address</p>
						<input type="text" name="customer_address" required placeholder="Enter Address" style="padding-left: 4px; color:white">
						<br>
						<br>
						<p style="padding-left: 4px">Customer Contact</p>
						<input type="text" name="customer_contact" required placeholder="Enter Contact Details" style="padding-left: 4px; color:white">
						<br>
						<br>
						<br>
						<div>
							<!--<a href = "#" style="text-decoration: none">--><center><input type="submit" name="register" value="Create Account"></center><!--</a>-->
						</div>
						<br>
						<br>
						
					
					</form>


			
		</div>
	</body>
</html>

<?php
	if(isset($_POST['register'])){

		
		$ip = getIp();

		$customer_name = $_POST['customer_name'];
		$customer_email = $_POST['customer_email'];
		$pass = $_POST['pass'];
		$customer_address = $_POST['customer_address'];
		$customer_contact = $_POST['customer_contact'];



		$insert_c = "INSERT into customers(customer_ip,customer_name,customer_email,customer_pass, customer_address, customer_contact) values('$ip','$customer_name','$customer_email','$pass','$customer_address','$customer_contact')";

		$run_c=mysqli_query($con, $insert_c);

		$sel_cart="SELECT * from cart where ip_add='$ip'";
		session_start();
		$run_cart=mysqli_query($con,$sel_cart);

		$check_cart= mysqli_num_rows($run_cart);
		$_SESSION['customer_email']=$customer_email;
			
			echo "<script>alert('Account has been created successfully , Thanks!')</script>";
			echo "<script>window.open('../index.php','_self')</script>";

		/*if($check_cart==0){

			$_SESSION['customer_email']=$customer_email;
			echo "<script>alert('Account has been created successfully , Thanks!')</script>";
			echo "<script>window.open('my_account.php','_self')</script>";

		}
		else{

			$_SESSION['customer_email']=$customer_email;
			echo "<script>alert('Account has been created successfully , Thanks!')</script>";
			echo "<script>window.open('../checkout.php','_self')</script>";

		}

		

		if($run_c){
			echo "<script>alert('registration successfull!')</script>";
			echo"<script>window.open('customer_registrationf.php','_self')</script>";
		}*/

	}


?>
	
