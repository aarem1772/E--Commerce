
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="../styles/loginstyle.css">
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
					<form method="post" action="index.php">
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
							<a href = "#" style="text-decoration: none"><font color="white" face="sans serif" size="5"><center>Sign In</center></font></a>
						</div>
						<br>
						<br>
						<a href = "checkout.php?forget_pass" style="text-decoration: none"><font color="white" face="sans-serif" size="4"><center>Forgot Password?</center></font></a>
						<br>
						<a href = "customer_registrationf.php" style="text-decoration: none"><font color="white" face="sans-serif" size="4"><center>New? Register Now</center></font></a>
					
					</form>


			
		</div>
	</body>
</html>
	