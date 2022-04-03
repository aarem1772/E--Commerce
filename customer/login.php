
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="../styles/loginstyle.css">

	<?php

	session_start();
	include("../includes/db.php");
	
	include("../functions/functions.php")


	?>
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
				<h1>Login Here</h1>
					<form method="post" action="login.php">
						<p style="padding-left: 4px">Email</p>
						<input type="text" name="email" placeholder="Enter Email" style="padding-left: 4px; color:white">
						<br>
						<br>
						<p style="padding-left: 4px">Password</p>
						<input type="password" name="pass" placeholder="Enter Password" style="padding-left: 4px;  color:white" >
						<br>
						<br>
						<br>
						<div>
							<center><input type="submit" name="login" value="LOGIN" ></center>
						</div>
						<br>
						<br>
						<a href = "checkout.php?forget_pass" style="text-decoration: none"><font color="white" face="sans-serif" size="4"><center>Forgot Password?</center></font></a>
						<br>
						<a href = "customer_registrationf.php" style="text-decoration: none"><font color="white" face="sans-serif" size="4"><center>New? Register Now</center></font></a>
					
					</form>

					<?php


						if(isset($_POST['login'])){

							$customer_email = $_POST['email'];
							$c_pass = $_POST['pass'];

							$sel_c = "SELECT * from customers where customer_pass='$c_pass' AND customer_email='$customer_email'";

							$run_c = mysqli_query($con , $sel_c);

							while($row_names = mysqli_fetch_array($run_c))
							{
								$c_name= $row_names['customer_name'];
								$c_id=$row_names['customer_id'];
								$c_address=$row_names['customer_address'];
							}
							
							/*
							while($row_names = mysqli_fetch_array($sel_run)){
							$cat_id = $row_names['cust'];
							}*/
							$check_customer = mysqli_num_rows($run_c);

							if($check_customer==0){

								echo "<script>alert('Password or email is incorrect please try again')</script>";

								exit();
							}


							$ip=getIp();
							$sel_cart="SELECT * from cart where ip_add='$ip'";

							$run_cart=mysqli_query($con,$sel_cart);

							$check_cart= mysqli_num_rows($run_cart);

							/*if($check_customer>0 AND $check_cart==0){*/

								$_SESSION['customer_name']=$c_name;
								$_SESSION['customer_id']=$c_id;
								$_SESSION['customer_address']=$c_address;
								echo "<script>alert('You logged in successfully, Thanks!')</script>";
								echo "<script>window.open('../index.php','_self')</script>";

							/*}

							else{

								$_SESSION['customer_email']=$customer_email;
								echo "<script>alert('you logged in successfully, Thanks!')</script>";
								echo "<script>window.open('../index.php','_self')</script>";

							}*/

						}





					


					?>





			
		</div>
	</body>
</html>
	